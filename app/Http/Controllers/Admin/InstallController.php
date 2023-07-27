<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminService\Traits\AdminDatabaseTrait;
use App\Http\Controllers\Admin\AdminService\AdminImport\AdminImportController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class InstallController extends Controller
{
    use AdminDatabaseTrait;

    public function index()
    {
        Artisan::call('key:generate');
        return redirect(route('admin.install_setup'));
    }

    public function installSetup()
    {
        $data = $this->checkConnection();

        if ($data['ADMIKO_CONNECTED'] && $data['DB_CONNECTED']) {
            /*we are good to go, start installation*/
            $this->startInstallation();
            return redirect(route('admin.home'));
        } else {
            return view('admin.install')->with('data', $data);
        }
    }

    public function save()
    {
        $getKeys = Request()->only(
            [
                'DB_CONNECTION',
                'DB_HOST',
                'DB_PORT',
                'DB_DATABASE',
                'DB_USERNAME',
                'DB_PASSWORD',
                'ADMIKO_APP_KEY'
            ]
        );
        $getKeys['APP_URL'] = URL::to('/');

        $path = base_path('.env');
        $content = file_get_contents($path);
        foreach($getKeys as $key=> $value){
            if (preg_match("/^{$key}=/m", $content)) {
                $content = preg_replace(
                    "/^{$key}=.*/m",
                    "{$key}=" . $value,
                    $content
                );
            } else {
                $content = $content. "{$key}=" . $value . "\n\n";
            }
        }
        file_put_contents($path, $content);

        return redirect(route('admin.install_step_two'));
    }

    public function installStepTwo()
    {
        $data = $this->checkConnection();

        if ($data['ADMIKO_CONNECTED'] && $data['DB_CONNECTED']) {
            /*we are good to go, start installation*/
            $this->startInstallation();
            return redirect(route('admin.home'));
        } else {
            $error = [];
            if (!$data['DB_CONNECTED']) {
                $error[] = 'Can\'t connect to database, please check your settings.';
            }
            if ($data['ADMIKO_ERROR']) {
                $error[] = $data['ADMIKO_ERROR'];
            }
            return back()->withErrors(['message' => $error]);
        }
    }

    public function startInstallation()
    {
        Artisan::call('migrate', ['--path' => 'database/migrations/admin','--force' => true]);
        Artisan::call('db:seed', ['--class' => 'Database\Seeders\Admin\AdminDatabaseSeeder']);

        File::delete(base_path('app/Http/Controllers/Admin/') . 'InstallController.php');
        File::delete(base_path('routes/admin/routes_public/') . 'install.php');
        File::delete(base_path('resources/views/admin/') . 'install.blade.php');
    }

    public function checkConnection()
    {
        $data['DB_CONNECTED'] = false;
        $data['DB_CONNECTION'] = env('DB_CONNECTION', '');
        $data['DB_HOST'] = env('DB_HOST', '');
        $data['DB_PORT'] = env('DB_PORT', '');
        $data['DB_DATABASE'] = env('DB_DATABASE', '');
        $data['DB_USERNAME'] = env('DB_USERNAME', '');
        $data['DB_PASSWORD'] = env('DB_PASSWORD', '');
        $data['DB_ERROR'] = false;

        $data['ADMIKO_CONNECTED'] = false;
        $data['ADMIKO_APP_KEY_ERROR'] = false;
        $data['ADMIKO_ERROR'] = false;

        try {
            if (DB::connection()->getPdo() && DB::connection()->getDatabaseName() == $data['DB_DATABASE']) {
                $data['DB_CONNECTED'] = true;
            }
        } catch (\Exception $e) {

        }

        if ($data['ADMIKO_APP_KEY'] = env('ADMIKO_APP_KEY', false)) {
            $adminImportController = new AdminImportController();
            $dataApi = $adminImportController->makeRequest(['refresh_files' => 1]);
            if ($dataApi->success) {
                $data['ADMIKO_CONNECTED'] = true;
            } else {
                $data['ADMIKO_ERROR'] = $dataApi->message??"Error, please contact support.";
            }
        }
        return $data;
    }
}

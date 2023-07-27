/**
 * @author Admiko
 * @copyright Copyright (c) Admiko
 * @link https://admiko.com
 * @Help We are committed to delivering the best code quality and user experience. If you have suggestions or find any issues, please don't hesitate to contact us. Thank you.
 * Note: To avoid overwriting, it is recommended to extend this class inside /public/assets/admiko/js/custom/ folder.
 **/
class AkImage {
    constructor() {
        this.imageUploadStart();
    }
    imageUploadStart() {
        $(".js-ak-image-upload").change(function () {
            let element = $(this);
            if (this.files && this.files[0]) {
                if ($('#ak-' + element.attr('id') + '-preview').length > 0) {
                    $('#ak-' + element.attr('id') + '-preview').closest(".ak-image-preview").remove();
                }
                var reader = new FileReader();
                reader.onload = function (e) {
                    var img = $('<img>');
                    img.attr('src', e.target.result);
                    img.attr('id', 'ak-' + element.attr('id') + '-preview');
                    element.after('<div class="ak-image-preview">' + element.data('selected') + '<br>' + img[0].outerHTML + '</div>');
                }
                reader.readAsDataURL(this.files[0]);
            } else {
                if ($('#ak-' + element.attr('id') + '-preview').length > 0) {
                    $('#ak-' + element.attr('id') + '-preview').closest(".ak-image-preview").remove();
                }
            }
        });
    }
}

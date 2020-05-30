$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.ajax-category-deletion').click(function () {
        if (confirm('Do you want to delete this category?')) {
            const self = $(this);

            $.ajax({
                url: self.data('url'),
                type: 'DELETE',
                success: function (res) {
                    if (res.success) {
                        $('#' + self.data('id')).html('');
                    } else {
                        const msg = res.message + "\nDo you want to refresh the page?";
                        if (confirm(msg)) {
                            window.location.reload();
                        }
                    }
                }
            });
        }
    });
});
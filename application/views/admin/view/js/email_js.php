<script>
let editorInstance;

$(document).ready(function() {
    // Initialize CKEditor
    ClassicEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: '<?php echo base_url("SwaController/upload_attachment"); ?>'
            },
            toolbar: {
                items: [
                    'undo', 'redo',
                    '|',
                    'heading',
                    '|',
                    'bold', 'italic', 'strikethrough', 'subscript', 'superscript', 'code',
                    '|',
                    'uploadImage', 'blockQuote',
                    '|',
                    'bulletedList', 'numberedList'
                ],
                shouldNotGroupWhenFull: false
            }

        })
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });

    var $emailForm = $('#emailForm');

    $('#sendBtn').on('click', function(event) {
        console.log('clicked');
        event.preventDefault();
        checkIfFormEmpty();
    });

    function checkIfFormEmpty() {
        var formData = new FormData(emailForm);
        var isFormEmpty = Array.from(formData.values()).every(value => value === '');
        if (isFormEmpty) {
            Swal.fire({
                title: 'Email empty!',
                icon: 'info',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
            });
        } else {
            sendFormData();
        }
    }

    function sendFormData() {
        var formData = new FormData(emailForm);
        const editorData = editorInstance.getData();
        const plainTextMessage = editorData.replace(/<[^>]+>/g, '');
        formData.append('message', plainTextMessage);

        // Attach selected files
        var files = $('#attachments')[0].files;
        for (let i = 0; i < files.length; i++) {
            formData.append('attachments[]', files[i]);
        }
        Swal.fire({
            showCancelButton: false,
            html: '<div><img src="<?php echo base_url('assets/assets/images/animated-email.gif')?>" width="200" height="200"/></div><div>Sending...</div>',
            allowOutsideClick: false,
            showConfirmButton: false,
            text: 'Sending...'

        })

        $.ajax({
            url: '<?php echo base_url() ?>SwaController/send_email',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                Swal.close();
                if (response.status === 'success') {
                    showSuccessAlert(response.message);
                } else {
                    showErrorAlert(response.message);
                }
            },
            error: function(error) {
                showErrorAlert('Email not sent!');
            }
        });
    }

    function showSuccessAlert(message) {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: message,
            // showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok'
        }).then((result) => {
            if (result.isConfirmed) {

                location.reload();
                $('#emailForm')[0].reset();
                // $('#editor').val('');
            } else {
                $('#emailForm')[0].reset();
                // $('#editor').val('');
            }
        });
    }

    function showErrorAlert(message) {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: message,
            // timer: 2000,
            // showConfirmButton: false,
        }).then(() => {
            // location.reload();
        });
    }

    $('a[data-toggle="pill"]').on('click', function(e) {
        if (getSelectedTab() == 'e-sent') {
            dataTable_esent.ajax.reload();
        } else if (getSelectedTab() == 'e-drafts') {
            dataTable_edrafts.ajax.reload();
        } else {
            dataTable_etrash.ajax.reload();
        }

        console.log("Currently selected tab ID:", getSelectedTab());
    });

    function getSelectedTab() {
        let activeTab = $(".nav-link.active");

        let tabId = activeTab.attr("href");

        return tabId.substring(1);
    }

    // function reload_table() {
    //     dataTable_esent.ajax.reload();
    // }
    var dataTable_esent = $('#e_sent_tbl').DataTable({
        processing: true,
        serverSide: true,
        searching: true,
        lengthChange: false,
        ordering: false,
        ajax: {
            url: "<?php echo base_url(); ?>SwaController/get_sent_emails",
            type: "POST",
            data: function(d) {
                d.start = d.start || 0;
                d.length = d.length || 10;
            }
        },
        columns: [{
                data: null,
                render: function(data, type, row) {
                    return `
                            <div class="check-star">
                                <div class="checkbox-fade fade-in-primary checkbox">
                                    <label class="form-label">
                                        <input type="checkbox" value>
                                        <span class="cr"><i class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                    </label>
                                </div>
                            </div>`;
                }
            },
            {
                data: 'sup_name',
                render: function(data) {
                    return `<a href="#" class="email-name waves-effect">${data}</a>`;
                }
            },
            {
                data: 'message',
                render: function(data) {
                    return `<a href="#" class="email-name waves-effect">${data}</a>`;
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return `<a href="#"><i class="icofont icofont-clip"></i></a>`;
                }
            },
            {
                data: 'datetime',
                // render: function(data, type, row) {
                //     return timeAgo(data);
                // }
            }
        ],
        searching: false,
        paging: true,
        pagingType: "full_numbers",
        lengthMenu: [
            [10, 25, 50, 1000],
            [10, 25, 50, "Max"]
        ],
        pageLength: 10,
        language: {
            search: '',
            searchPlaceholder: ' Search...',
            processing: '<div class="table-loader"></div>'
        }
    });

    // function timeAgo(datetime) {
    //     const timezoneOffset = 8 * 60; // Philippine Time (UTC+8) in minutes
    //     const now = new Date();

    //     // Convert the datetime string to a Date object
    //     const past = new Date(datetime * 1000); // Assuming datetime is a UNIX timestamp

    //     // Adjust for timezone offset
    //     const pastUtc = new Date(past.getTime() + timezoneOffset * 60 * 1000);
    //     const nowUtc = new Date(now.getTime() + timezoneOffset * 60 * 1000);

    //     const seconds = Math.floor((nowUtc - pastUtc) / 1000);

    //     const interval = {
    //         d: Math.floor(seconds / 86400),
    //         h: Math.floor((seconds % 86400) / 3600),
    //         i: Math.floor((seconds % 3600) / 60),
    //         s: seconds % 60,
    //     };

    //     if (interval.d > 0) {
    //         // More than a day ago, return only the date
    //         return pastUtc.toLocaleDateString('en-PH', {
    //             year: 'numeric',
    //             month: '2-digit',
    //             day: '2-digit'
    //         });
    //     } else {
    //         // Less than a day ago, return the time in HH:MM AM/PM format
    //         return pastUtc.toLocaleTimeString('en-PH', {
    //             hour: 'numeric',
    //             minute: 'numeric',
    //             hour12: true
    //         });
    //     }
    // }


});
</script>
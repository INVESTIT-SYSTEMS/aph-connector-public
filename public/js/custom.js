$('.news-addressed li').on('click', function () {
    $('.news-addressed li').removeClass('active');
    $(this).addClass('active');
});

$('.header-toggle-btn').click(function () {
    $(".header-sidebar").toggleClass('js-toggled');
});

// file uplode
$('#file-upload').change(function () {
    var filepath = this.value;
    var m = filepath.match(/([^\/\\]+)$/);
    var filename = m[1];
    $('#filename').html(filename);
});

$('#file-uploads').change(function () {
    var filepath = this.value;
    var m = filepath.match(/([^\/\\]+)$/);
    var filename = m[1];
    $('#filenames').html(filename);
});

document.addEventListener('DOMContentLoaded', function () {
    const deleteModal = $('#deleteConfirmationModal');
    const deleteButton = document.getElementById('confirmDeleteButton');

    window.confirmDelete = function (formId, itemName) {
        document.getElementById('deleteItemName').textContent = itemName;
        deleteButton.onclick = function () {
            document.getElementById(formId).submit();
        };
        deleteModal.modal('show');
    };

    window.confirmDeleteMedia = (url, itemName) => {
        document.getElementById('deleteItemName').textContent = itemName;
        deleteButton.onclick = () => {
            fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
            })
                .then(() => window.location.reload());
        }
        deleteModal.modal('show');
    }
});

//image preview init

const imageInput = document.getElementById('image-input');
if(imageInput !== null)
    imageInput.addEventListener('change', (event) => {
        const input = event.target;
        const previewContainer = document.getElementById('image-preview-container');
        // Clear existing previews
        previewContainer.innerHTML = '';

        if (input.files) {
            for (const file of input.files) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    let img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.display = 'block';
                    img.style.width = '200px';
                    img.style.height = 'auto';
                    img.style.marginTop = '10px';
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        }
    });

const imageInput2 = document.getElementById('image-input-2');

if(imageInput2 !== null)
    imageInput2.addEventListener('change', (event) => {
        const input = event.target;
        const previewContainer2 = document.getElementById('image-preview-container-2');
        // Clear existing previews
        previewContainer2.innerHTML = '';

        if (input.files) {
            for (const file of input.files) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    let img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.display = 'block';
                    img.style.width = '500px';
                    img.style.height = 'auto';
                    img.style.marginTop = '10px';
                    previewContainer2.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        }
    });

const searchButton = document.getElementById('search-button-comp');
const searchForm = document.getElementById('search-form-comp');
if(searchButton)
{
    searchButton.addEventListener('click', function (){
        searchForm.submit();
    });
}

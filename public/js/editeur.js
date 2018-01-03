let textarea = document.querySelector('#editor')

if(window.tinyMCE) {
    tinymce.init({
        selector: '#editor',
        plugins: 'image,paste',
        paste_data_images: true,
        automatic_uploads: true,
        images_upload_handler: (blobInfo, success, failure) => {
            let data = new FormData()
            data.append('attachable_id', textarea.dataset.id)
            data.append('attachable_type', textarea.dataset.type)
            data.append('image', blobInfo.blob(), blobInfo.filename())
            axios.post(textarea.dataset.url, data, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then((res) => {
                console.log(res.data)
                success(res.data.url)
            }).catch((err) => {
                console.log(err.response)
                success('http://placehold.it/300x150')
                failure(err.response.statutText)
            })
        }
    })
}
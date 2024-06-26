FilePond.registerPlugin(FilePondPluginFileEncode, FilePondPluginFileValidateSize, FilePondPluginImageExifOrientation, FilePondPluginImagePreview);
var inputMultipleElements = document.querySelectorAll("input.filepond-input-multiple");
inputMultipleElements && (Array.from(inputMultipleElements).forEach(function (e) {
        FilePond.create(e)
    }), FilePond.create(document.querySelector(".filepond-input-1"), {
        labelIdle: 'Pilih Foto 1<br> <span class="filepond--label-action">Browse</span>',
        imagePreviewHeight: 250,
        imageCropAspectRatio: "1:1",
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,
        // stylePanelLayout: "compact circle",
        styleLoadIndicatorPosition: "center bottom",
        styleProgressIndicatorPosition: "right bottom",
        styleButtonRemoveItemPosition: "left bottom",
        styleButtonProcessItemPosition: "right bottom",
        maxParallelUploads: 1,
        instantUpload: false,
        storeAsFile: true,
    }),
    FilePond.create(document.querySelector(".filepond-input-2"), {
        labelIdle: 'Pilih Foto 2<br><span class="filepond--label-action">Browse</span>',
        imagePreviewHeight: 250,
        imageCropAspectRatio: "1:1",
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,
        // stylePanelLayout: "compact circle",
        styleLoadIndicatorPosition: "center bottom",
        styleProgressIndicatorPosition: "right bottom",
        styleButtonRemoveItemPosition: "left bottom",
        styleButtonProcessItemPosition: "right bottom",
        maxParallelUploads: 1,
        instantUpload: false,
        storeAsFile: true,
    }),
    FilePond.create(document.querySelector(".filepond-input-3"), {
        labelIdle: 'Pilih Foto 3<br><span class="filepond--label-action">Browse</span>',
        imagePreviewHeight: 250,
        imageCropAspectRatio: "1:1",
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,
        // stylePanelLayout: "compact circle",
        styleLoadIndicatorPosition: "center bottom",
        styleProgressIndicatorPosition: "right bottom",
        styleButtonRemoveItemPosition: "left bottom",
        styleButtonProcessItemPosition: "right bottom",
        maxParallelUploads: 1,
        instantUpload: false,
        storeAsFile: true,
    }), FilePond.create(document.querySelector(".filepond-input-4"), {
        labelIdle: 'Pilih Foto 4<br><span class="filepond--label-action">Browse</span>',
        imagePreviewHeight: 250,
        imageCropAspectRatio: "1:1",
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,
        // stylePanelLayout: "compact circle",
        styleLoadIndicatorPosition: "center bottom",
        styleProgressIndicatorPosition: "right bottom",
        styleButtonRemoveItemPosition: "left bottom",
        styleButtonProcessItemPosition: "right bottom",
        maxParallelUploads: 1,
        instantUpload: false,
        storeAsFile: true,
    }), FilePond.create(document.querySelector(".filepond-input-5"), {
        labelIdle: 'Pilih Foto 5<br><span class="filepond--label-action">Browse</span>',
        imagePreviewHeight: 250,
        imageCropAspectRatio: "1:1",
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,
        // stylePanelLayout: "compact circle",
        styleLoadIndicatorPosition: "center bottom",
        styleProgressIndicatorPosition: "right bottom",
        styleButtonRemoveItemPosition: "left bottom",
        styleButtonProcessItemPosition: "right bottom",
        maxParallelUploads: 1,
        instantUpload: false,
        storeAsFile: true,
    }),


    FilePond.create(document.querySelector(".filepond-edit-1"), {
        labelIdle: 'Pilih Foto 1<br> <span class="filepond--label-action">Browse</span>',
        imagePreviewHeight: 250,
        imageCropAspectRatio: "1:1",
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,
        // stylePanelLayout: "compact circle",
        styleLoadIndicatorPosition: "center bottom",
        styleProgressIndicatorPosition: "right bottom",
        styleButtonRemoveItemPosition: "left bottom",
        styleButtonProcessItemPosition: "right bottom",
        maxParallelUploads: 1,
        instantUpload: false,
        storeAsFile: true,
    }),
    FilePond.create(document.querySelector(".filepond-edit-2"), {
        labelIdle: 'Pilih Foto 2<br><span class="filepond--label-action">Browse</span>',
        imagePreviewHeight: 250,
        imageCropAspectRatio: "1:1",
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,
        // stylePanelLayout: "compact circle",
        styleLoadIndicatorPosition: "center bottom",
        styleProgressIndicatorPosition: "right bottom",
        styleButtonRemoveItemPosition: "left bottom",
        styleButtonProcessItemPosition: "right bottom",
        maxParallelUploads: 1,
        instantUpload: false,
        storeAsFile: true,
    }),
    FilePond.create(document.querySelector(".filepond-edit-3"), {
        labelIdle: 'Pilih Foto 3<br><span class="filepond--label-action">Browse</span>',
        imagePreviewHeight: 250,
        imageCropAspectRatio: "1:1",
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,
        // stylePanelLayout: "compact circle",
        styleLoadIndicatorPosition: "center bottom",
        styleProgressIndicatorPosition: "right bottom",
        styleButtonRemoveItemPosition: "left bottom",
        styleButtonProcessItemPosition: "right bottom",
        maxParallelUploads: 1,
        instantUpload: false,
        storeAsFile: true,
    }), FilePond.create(document.querySelector(".filepond-edit-4"), {
        labelIdle: 'Pilih Foto 4<br><span class="filepond--label-action">Browse</span>',
        imagePreviewHeight: 250,
        imageCropAspectRatio: "1:1",
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,
        // stylePanelLayout: "compact circle",
        styleLoadIndicatorPosition: "center bottom",
        styleProgressIndicatorPosition: "right bottom",
        styleButtonRemoveItemPosition: "left bottom",
        styleButtonProcessItemPosition: "right bottom",
        maxParallelUploads: 1,
        instantUpload: false,
        storeAsFile: true,
    }),
    FilePond.create(document.querySelector(".filepond-edit-5"), {
        labelIdle: 'Pilih Foto 5<br><span class="filepond--label-action">Browse</span>',
        imagePreviewHeight: 250,
        imageCropAspectRatio: "1:1",
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,
        // stylePanelLayout: "compact circle",
        styleLoadIndicatorPosition: "center bottom",
        styleProgressIndicatorPosition: "right bottom",
        styleButtonRemoveItemPosition: "left bottom",
        styleButtonProcessItemPosition: "right bottom",
        maxParallelUploads: 1,
        instantUpload: false,
        storeAsFile: true,
    })
);

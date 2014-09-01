$( document ).ready(function()
{
    jQuery('.tinymce').tinymce({
        plugins: 'advlist, anchor, autolink, autoresize, hr, image, link, media, paste, responsivefilemanager, table',
        image_advtab: true,
        external_filemanager_path: jQuery('#tinymce-data').data('external-filemanager-path'),
        filemanager_title:"Responsive Filemanager" ,
        external_plugins: { "filemanager" : "../filemanager/plugin.min.js"},
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        toolbar2: "responsivefilemanager | image | media | link unlink anchor"
    });

});

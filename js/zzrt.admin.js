jQuery(document).ready(function($){
    var mediaUploader;
    var slideUrl1 = $('#slide1-preview').attr('src');
    $('#upload-slide-1').on('click', function(e){
        e.preventDefault();
        if(mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose a Slide #1',
            button: {
                text: 'Choose Picture'
            },
            multiple: true
        });

        mediaUploader.on('select', function(){
            attachment = mediaUploader.state().get('selection').first().toJSON();
            console.log(attachment.url);
            $('input[name="slide-1"]').val(attachment.url);
            $('#slide1-preview').attr('src',attachment.url);
            if(slideUrl1 != attachment.url) {
                $('div#slide1-change').html('<span class="changed">Сохраните изменения</span>');
            } else {
                $('div#slide1-change').text(' ');
            }
        });

        mediaUploader.open();
    });

    var slideUrl2 = $('#slide2-preview').attr('src');
    var mediaUploader2;
    $('#upload-slide-2').on('click', function(e){
        e.preventDefault();
        if(mediaUploader2) {
            mediaUploader2.open();
            return;
        }

        mediaUploader2 = wp.media.frames.file_frame = wp.media({
            title: 'Choose a Slide #2',
            button: {
                text: 'Choose Picture'
            },
            multiple: true
        });

        mediaUploader2.on('select', function(){
            attachment2 = mediaUploader2.state().get('selection').first().toJSON();
            console.log(attachment2.url);
            $('input[name="slide-2"]').val(attachment2.url);
            $('#slide2-preview').attr('src',attachment2.url);
            if(slideUrl2 != attachment2.url) {
                $('div#slide2-change').html('<span class="changed">Сохраните изменения</span>');
            } else {
                $('div#slide2-change').text(' ');
            }
        });

        mediaUploader2.open();
    });

    var slideUrl3 = $('#slide3-preview').attr('src');
    var mediaUploader3;
    $('#upload-slide-3').on('click', function(e){
        e.preventDefault();
        if(mediaUploader3) {
            mediaUploader3.open();
            return;
        }

        mediaUploader3 = wp.media.frames.file_frame = wp.media({
            title: 'Choose a Slide #3',
            button: {
                text: 'Choose Picture'
            },
            multiple: true
        });

        mediaUploader3.on('select', function(){
            attachment3 = mediaUploader3.state().get('selection').first().toJSON();
            console.log(attachment3.url);
            $('input[name="slide-3"]').val(attachment3.url);
            $('#slide3-preview').attr('src',attachment3.url);
            if(slideUrl3 != attachment3.url) {
                $('div#slide3-change').html('<span class="changed">Сохраните изменения</span>');
            } else {
                $('div#slide3-change').text(' ');
            }
        });

        mediaUploader3.open();
    });
});
<!DOCTYPE HTML>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <title>Uploadify V3 &amp; CodeIgniter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Capsone-System2" >

    <!-- Styles -->
    <link href="/assets/bootstrap/css/bootstrap.min.css" type="text/css" media="screen" rel="stylesheet"/>
    <link href="<?php echo base_url;?>upload/uploadify.css" type="text/css" media="screen" rel="stylesheet"/>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<script>
    $(document).ready(function () {
 
        var base_url = '<?php echo base_url(); ?>';
 
        $('#upload-file').click(function (e) {
            e.preventDefault();
            $('#userfile').uploadify('upload', '*');
        });
 
        $('#userfile').uploadify({
            'auto':false,
            'swf': base_url + 'upload/uploadify.swf',
            'uploader': base_url + 'uploadify_v3/do_upload',
            'cancelImg': base_url + 'upload/uploadify-cancel.png',
            'fileTypeExts':'*.jpg;*.bmp;*.png;*.tif',
            'fileTypeDesc':'Image Files (.jpg,.bmp,.png,.tif)',
            'fileSizeLimit':'2MB',
            'fileObjName':'userfile',
            'buttonText':'Select Photo(s)',
            'multi':true,
            'removeCompleted':false
        });
    });
</script>
</head>
<body>

<!-- Main Content -->
<div class="container">
    <h1 class="page-header">Uploadify V3 &amp; CodeIgniter</h1>

    <p>This is a simple tutorial demo showing Uploadify V3 working with CodeIgniter 2.1.2</p>
    <?php echo form_open_multipart(); ?>
    <ul class="unstyled">
        <li>
            <?php echo form_upload('userfile','','id="userfile"'); ?>
            <?php echo (isset($error)) ? $error : ''; ?>
        </li>
        <li>
            <?php echo form_button(array('content'=> 'Upload', 'id'=>'upload-file', 'class'=>'btn btn-large btn-primary')); ?>
        </li>
    </ul>
    <?php echo form_close(); ?>
</div>
<!-- End Of Main Content -->

<script src="<?php echo base_url;?>assets/js/jquery/uploadify_31/jquery.uploadify-3.1.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {

        var base_url = '<?php echo base_url; ?>';
        //alert(base_url);

        $('#upload-file').click(function (e) {
            e.preventDefault();
            $('#userfile').uploadify('upload', '*');
            alert(base_url);
        });

        $('#userfile').uploadify({
            'debug':true,
            'auto':false,
            'swf': base_url + 'upload/uploadify.swf',
            'uploader': base_url + 'uploadify_v3/do_upload',
            'cancelImg': base_url + 'upload/uploadify-cancel.png',
            'fileTypeExts':'*.jpg;*.bmp;*.png;*.tif',
            'fileTypeDesc':'Image Files (.jpg,.bmp,.png,.tif)',
            'fileSizeLimit':'2MB',
            'fileObjName':'userfile',
            'buttonText':'Select Photo(s)',
            'multi':true,
            'removeCompleted':false,
            'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
            }
        });
    });
</script>
</body>
</html>
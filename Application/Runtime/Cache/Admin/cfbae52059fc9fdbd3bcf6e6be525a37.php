<?php if (!defined('THINK_PATH')) exit();?><!Doctype html>
<html lang="en">
<head>

<meta charset="utf-8"/>
<title>填写详情 - <?php echo C('SITE_TITLE');?></title>

<link type="text/css" rel="stylesheet" href="/Public/MD/css/font-awesome/css/font-awesome.css"/>
<link type="text/css" rel="stylesheet" href="/Public/MD/css/codemirror.css"/>
<link type="text/css" rel="stylesheet" href="/Public/MD/css/highlight/xcode.css"/>
<link type="text/css" rel="stylesheet" href="/Public/MD/css/amd.css"/>
<link type="text/css" rel="stylesheet" href="/Public/MD/css/markdown.css"/>

<script src="/Public/MD/js/codemirror/lib/codemirror.js"></script>
<script src="/Public/MD/js/codemirror/mode/markdown/markdown.js"></script>
<script src="/Public/MD/js/hogan-3.0.1.min.js"></script>
<script src="/Public/MD/js/marked-0.3.2.min.js"></script>
<script src="/Public/MD/js/highlight-8.1.0.min.js"></script>
<script src="/Public/MD/js/pie/pie.js"></script>
<script src="/Public/MD/js/pie/unit.js"></script>
<script src="/Public/MD/js/pie/amarkdown.js"></script>

</head>
<body>

<div id="amd-editor"></div>

<script>
(function (PIE) {
window.addEventListener('load', function () {
    PIE.makeAMarkdown(document.getElementById('amd-editor'), {
        amdUploadImgAction: '/index.php/Home/Project/uploadDetailImg',
        amdPubMethod: 'post',
        amdPubAction: '/index.php/Admin/Activity/putDetail',
        amdInitText: '<?php echo ($detail); ?>',
        amdInitTitle: '<?php echo ($id); ?>',
        titleName: 'atitle',
        textName: 'text'
    });
});
}(PIE));
</script>
</body>
</html>
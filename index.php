<?php

// 加载 FineUIPHP 库
require_once 'fineui-lib/autoload.php';

// 初始化配置信息
\FineUIPHP\Config\GlobalConfig::loadConfig(array(
    'Theme'           => 'Default',  // 默认主题
    'ResourceHandler' => 'res.php'  // 资源文件获取入口
));

// 打开输出缓冲
ob_start(function ($content) {
    return \FineUIPHP\ResourceManager\ResourceManager::finish($content);
});
?>

<html>
<head>
    <title>无框架使用教程</title>
</head>
<body style="padding: 20px;">
<?php
echo \FineUIPHP\FineUIControls::textBox()->text('默认文字');
echo '<hr/>';
echo \FineUIPHP\FineUIControls::button()->text('提交');
?>
</body>
</html>

<?php
// 关闭输出缓冲
ob_end_flush();
?>



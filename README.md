# 无框架使用教程

@(FineUIPHP)

[TOC]

假设文档路径为 `/var/www`，解压缩 `FineUIPHP` 代码包至该目录下。

## 1 入口文件
创建 `index.php` 入口文件。全部代码如下：

```php
<?php

// 加载 FineUIPHP 库
require_once 'fineui-lib/autoload.php';

// 初始化配置信息
\FineUIPHP\Config\GlobalConfig::loadConfig(array(
    'CustomTheme'     => 'pure_black',  // 默认主题
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
```

下面是代码的具体说明

### 1.1 引入代码库

```php
require_once 'fineui-lib/autoload.php';
```

`FineUIPHP` 提供了自动加载文件，只需要包含这个文件即可。

### 1.2 初始化配置信息

```php
\FineUIPHP\Config\GlobalConfig::loadConfig(array(
    'CustomTheme'     => 'pure_black',  // 默认主题
    'ResourceHandler' => 'res.php'  // 资源文件获取入口
));
```

您可以直接在调用时定义配置规则。当然，也可以将配置信息保存到单独的文件中，只要保证配置信息是一个关联数组即可。

常用配置内容，参见附录1

### 1.3 增加输出缓冲

在程序最开始输出之前增加下面的代码

```php
ob_start(function ($content) {
    return \FineUIPHP\ResourceManager\ResourceManager::finish($content);
});
```

上面的代码主要作用是解析 `HTML` 里的标签，根据其内容来生成对应的初始化 `JS`脚本。

在程序最后输出末尾增加下面的代码

```php
ob_end_flush();
```

## 2 静态资源入口文件

`FineUIPHP` 的静态资源需要通过 `PHP` 动态加载，因此需要提供一个简单的入口文件。

```php
<?php

// 加载 FineUIPHP 库
require_once 'fineui-lib/autoload.php';

$handler = new \FineUIPHP\ResourceManager\ResourceHandler();

$handler->ProcessRequest();
```

并且将入口文件的地址设置到配置信息中（参见 1.2）

## 3 附录1

可用的配置项（这里列的都是默认值）: 
* Theme="Default"
* Language="zh_CN"
* DebugMode="false"
* FormMessageTarget="Qtip"
* FormOffsetRight="0"
* FormLabelWidth="100"
* FormLabelSeparator="："
* FormLabelAlign="Left"
* FormRedStarPosition="AfterText"
* EnableAjax="true"
* EnableAjaxLoading="true"
* AjaxTimeout="120"
* AjaxLoadingType="Default"
* AjaxLoadingText=""
* ShowAjaxLoadingMaskText=false
* AjaxLoadingMaskText=""
* CustomTheme=""
* CustomThemeBasePath="/res/themes"
* IconBasePath="/res/icon"
* JSBasePath="/res/js"
* IEEdge="true"
* EnableShim="false"
* DisplayMode="Normal"
* MobileAdaption="true"
* EnableAnimation="false"
* LoadingImageNumber="1"

# newYii2App
new yii2 app template
### 这是一个从官方yii2压缩包中剥离出来的应用包

### 它适用于这样的情形：
- 您有很多个应用，您的代码空间有限（比如我在SAE中使用）
- 您有多个应用，最好可以共用一个vendor目录，甚至是原本的advanced目录
- 同时，您可能还希望所有应用互不影响，是的，我也在这么想
- 同时，您可能还希望所有应用的功能不能有多局限（因为新架构的原因某些功能不能使用），是的，我也尽力融为一体了

为了不至于让您感觉难以理解，我还对配置进行了精简，您只需要配置入口文件中的引入项即可

### 比如：

位于newApp目录下的 yii 文件（命令行执行文件）
```
require(dirname(__DIR__) . '/advanced/vendor/autoload.php');
require(dirname(__DIR__) . '/advanced/vendor/yiisoft/yii2/Yii.php');
```
位于newApp/web目录下的index.php文件（网站入口文件）
```
require(dirname(dirname(__DIR__)) . '/advanced/vendor/autoload.php');
require(dirname(dirname(__DIR__)) . '/advanced/vendor/yiisoft/yii2/Yii.php');
```
除此之外，您对自己的应用不需要进行任何代码逻辑的修改了

### 配置文件
您在整合资源和项目的时候肯定会注意配置文件的，或者您在开发新项目的时候也肯定会注意配置文件的。一个小小的区别是，我这里默认使用了数据库来记录日志，而且附带了高级模板中的用户登录功能，所以您可能会需要执行下面的操作
```
yii migrate --migrationPath=@yii/log/migrations/
yii migrate up
```
来合并初始数据
### 可能的麻烦
当然，如果您在编写应用时，直接使用了官方应用模板中的命名空间，那么您可能必须要批量修改命名空间。当然，我想这对于你来说并不算什么问题。

另外，我加上了自己个人觉得更方便的 DEBUG_HOST 定义。

### 那么，它还有的局限性吗？
这个在于您通常是如何部署自己的代码结构的。

我个人不会使用 backend 和 frontend 来分别部署前后台，

我可能会通过不同的入口文件来区分前后台。

所以我没有这方面的问题。

### 如果需要有更多的模块区分呢？
你完全可以创建 modules 目录来建立更多模块。

如果我还有可能每个项目都 引入了 不同的第三方组件呢？

我想说，是的，我们共用了 vendor，所以第三方组件都是可以共用的，但是性能丝毫不受影响。

你的第三方组件依赖可以暂时写在config注释中

呃……是的，这是一个为了节省资源的权宜之计，它并不适合有代码洁癖，规范强迫症的人来使用。

### 最后
最后，当然是，如果你发现这个初始应用的模板应该有所修改，或者应该完善，或者应该具备的功能，
我欢迎你来告诉我，我都尽可能的都整合到里面去o(^▽^)o。

祝你好运！q(≧▽≦q)
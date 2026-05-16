# 🌐 WebView与电视直播项目资源下载一览

### 📑 总简介
在智能电视和机顶盒上看直播，还在满世界找极易失效的IPTV源吗？本站为您汇总了当前开源社区中最热门的 **WebView及大屏浏览器方案**。
这类APP通过内置的浏览器内核（如腾讯X5内核、原生WebKit或Firefox Gecko），直接在电视后台全屏渲染并播放官方网页直播流。它们**极致稳定、天然防盗链**，甚至支持免电视端VIP直接观看1080P点播内容。

以下是我们为您整理的主流开源项目最新版本、原始代码仓库及官方下载渠道一览。

> ⚠️ **合规说明**：本页收录的所有工具均为开源项目或合法合规的第三方工具包，仅供家庭HTPC搭建及个人技术交流使用。我们不提供任何破解服务、不储存任何视频资源。请在使用网页端服务时遵守各大视频平台的用户协议。

---

## 🚀 大屏原生浏览器系列 (网页冲浪/视频嗅探)

### 1. TV Bro (专为遥控器而生的浏览器)
这是一款彻底为电视遥控器优化的轻量级网页浏览器，调用安卓自带WebKit引擎，支持多标签、语音搜索和UA切换（伪装PC/手机），让电视网页浏览不再需要外接鼠标。
*   **软件版本**：v2.0.1
*   **原项目地址**：[GitHub - truefedex/tv-bro](https://github.com/truefedex/tv-bro)
*   **官方下载地址**：
    *   [Google Play 商店下载](https://play.google.com/store/apps/details?id=com.phlox.tvwebbrowser)
    *   [GitHub Releases 本地包下载](https://github.com/truefedex/tv-bro/releases)

### 2. Firefox Browser (火狐浏览器官方库)
Mozilla官方维护的顶级浏览器开源库，拥有自研的Gecko内核与无与伦比的插件扩展能力，适合需要深度定制与运行复杂去广告脚本的高阶玩家。
*   **软件版本**：Nightly / 滚动更新版
*   **原项目地址**：[GitHub - mozilla-firefox/firefox](https://github.com/mozilla-firefox/firefox)
*   **官方下载地址**：
    *   [Firefox 官方下载](https://www.firefox.com/)
    *   [Firefox Nightly 版本](https://nightly.mozilla.org/)

---

## 📺 电视直播套壳方案 (极客与适老版)

### 3. DongYuTVWeb
同样主打适老化，操作简单，使用 WebView JavaScript 注入方式实现全屏去无用样式。内嵌支持通过自定义脚本解析带有防盗链验证的特殊官方直播流。
*   **软件版本**：v1.0.6.5
*   **原项目地址**：[GitHub - Yu2002s/DongYuTVWeb](https://github.com/Yu2002s/DongYuTVWeb)
*   **官方下载地址**：
    *   [Gitee Releases 快速下载](https://gitee.com/jdy2002/DongYuTvWeb/releases)
---

### 4. WebViewTvLive (纯粹极客之选)
基于腾讯X5 WebView开发的电视直播应用。支持多端适配（手机/平板/电视/车机）、全自动更新频道列表。适合对画质和稳定性有要求、且设备性能较好的用户（推荐Android 9、4GB内存以上）。
*   **软件版本**：v2.1.1
*   **原项目地址**：[GitHub - hxh19950701/WebViewTvLive](https://github.com/hxh19950701/WebViewTvLive)
*   **官方下载地址**：
    *   [GitHub Releases 下载](https://github.com/hxh19950701/WebViewTvLive/releases)

#### 升级版简介
*   *修改了X5加载的逻辑*
*   *精简了不必要的逻辑代码*
*   *更换了加密直播源*
*   *下载包名：app-webtv171release.apk*
*   大小：1.6M

![截图1](/img/webtv1.jpg)
![截图2](/img/webtv2.jpg)
![截图3](/img/webtv3.jpg)

### 5. CCTV_Viewer (复古适老版)
专为长辈和低配盒子设计的简易网页视频收看软件。采用复古的闭路电视操作逻辑，首创“双标签页缓冲技术”降低换台黑屏时间，最低可在古董级的安卓4.4.2系统上流畅运行。
*   **软件版本**：v1.8.0
*   **原项目地址**：[GitHub - Eanya-Tonic/CCTV_Viewer](https://github.com/Eanya-Tonic/CCTV_Viewer)
*   **官方下载地址**：
    *   [Github Releases 下载](https://github.com/Eanya-Tonic/CCTV_Viewer/releases/latest)

#### 升级版简介
*   *频道内容扩展到165+*
*   *实现了「直播 + 点播 + 轮播 + 电台」的多元化视听*
*   *增加了音频可视化特效功能*
*   *增加了睡眠定时功能*
*   *优化了内部逻辑*
*   *下载包名：app-ccx5183release.apk*
*   大小：2.7M

![截图1](/img/ccx50.png)
![截图2](/img/ccx51.png)
![截图3](/img/ccx52.png)
![截图3](/img/ccx54.png)

### 6. 油桃TV (utao) - 免电视VIP的追剧神器
专为电视/投影设计，通过浏览器插件机制绕过平台限制。用普通手机/PC端会员账号登录网页版爱奇艺、腾讯等平台，直接在电视端播放1080P无阉割版内容，并适配各大卫视和CCTV官网直播。
*   **软件版本**：稳定版 (Latest Dec 2024)
*   **原项目地址**：[GitHub - VonChange/utao](https://github.com/VonChange/utao)
*   **官方下载地址**：
    *   [官网直达下载](http://www.utao.tv)

#### 升级版简介
*   *内置了X5内核*
*   *微调了部分点播代码*
*   *下载包名：uuwebtv-1.16.1.apk*
*   大小：38.5M

![截图1](/img/uutv1.jpg)
![截图2](/img/uutv2.jpg)

## 🛠️ 大屏聚合流媒体框架 (终极方案)

### 7. FongMi/TV (蜂蜜TV)
目前开源界拥有极高人气（超7.4k Stars）的点播与直播聚合媒体播放器。它不仅仅是一个浏览器，而是允许用户在配置中精细注入UA、Referer防盗链标头，甚至支持挂载Java/Python/JS本地爬虫代码的终极聚合大屏框架。
*   **软件版本**：持续迭代更新 (Release分支)
*   **原项目地址**：[GitHub - FongMi/TV](https://github.com/FongMi/TV)
*   **官方下载地址**：
    *   [前往 GitHub Release 页面下载](https://github.com/FongMi/TV/releases) (根据不同架构选择APK)

#### 升级版简介
*   *增加X5内核逻辑与内置Webview互选*
*   *增加直播逻辑可设置点播直播启动选择*
*   *支持web版视频格式"video://"及"webview://"*
*   *下载包名：moying3050-java-armeabi_v71.apk*
*   大小：16.7M

![截图1](/img/moying1.jpg)
![截图2](/img/moying2.jpg)
![截图3](/img/moying3.jpg)
---
*(注：由于Android应用分不同设备架构，上述项目通常在 Releases 页面提供多个版本。请根据您的电视/盒子架构（如 `armeabi-v7a` 为32位，`arm64-v8a` 为64位）下载对应的APK文件。
升级版下载地址：WebTv-apk链接：https://pan.quark.cn/s/d07e5a937bf4 提取码：进群回复“/提取码”)*

![截图3](https://raw.githubusercontent.com/jn950/live/main/img/iuai-qun.png)

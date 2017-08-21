考虑到这个功能模块一般与其他模块无复用性，因此把js写在一个文件内(/public/js/unlock.js)，
这样可以减少http请求数，而且此模块代码量少，单文件更便于维护。
为了使代码更易维护，结构更清晰，在unlock.js文件内分出MVC三大部分，unlockModel对应M,主管localStorage数据存取，
unlockView对应V,用于更改视图(画线),eventHandler对应C,用于处理事件逻辑。
同时，代码针对解耦作了相应处理。


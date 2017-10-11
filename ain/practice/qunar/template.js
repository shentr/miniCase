var solve = function (tpl, json) {
    return tpl.replace(/{{(.*?)}}/g, function (match, p1, offset) {
         // console.log(arguments)
        if(p1.trim()[0] === '#') {
        } else if (p1.trim()[0] === '^') {
        }
        let obj = JSON.parse(json);
        let param = p1.split('.'), ans = obj;
        for(let i=0; i<param.length; i++) {
            ans = ans[param[i]];
        }
        return ans;
    })
};

let tpl=read_line(), json=read_line();
print(solve(tpl, json));


/*
solve('<h1>Welcome {{name.a}} and {{name.b}}</h1>','{"name": {"a": "Qunar-Man", "b": "hello"}}')
* */

/*
* 题目描述：
在去哪儿，前端工程师，在日常工作中，经常会使用到模板引擎，比较常用的有 JQuery Template、artTemplate、Mustache 等。现在要求你实现一个简单的类似于Mustache的模板引擎，根据传入的模版字符串和数据，替换模版字符串中的标签，输出出对应的HTML片段。

需要支持的模板标签有：
  1、 {{keyName}}：输出对象中属性名为keyName的值。需要支持多级属性，比如{{keyName.name1.name2}}；
  2、{{#keyName}}content{{/keyName}}：keyName对应的值为“真”时，输出content，为“假”时不输出
  3、{{#arr}}content{{/arr}}: arr对应的值为数组时，遍历这个数组，进行一次或多次渲染。
  4、{{.}}表示数组遍历中当前的元素（可以只考虑基本数据类型）。
  5、{{^keyName}}content{{/keyName}}：keyName对应的值为“假”时，输出content，为“真”时不输出；
注意：如果给定的数据中，没有对应的属性字段，标签替换为空。
输入
第一行出入模版字符串（长度不超过1000），字符串中可以包含模板标签，也可以不包括标签。
第二行输入需要渲染的数据（JSON 字符串，长度不超过1000）。
输出
输出对应的 HTML 的片段。

样例输入
<h1>Welcome {{name}}</h1>
{"name":"Qunar-Man"}
样例输出
<h1>Welcome Qunar-Man</h1>*/
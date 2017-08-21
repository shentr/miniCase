var ganged = {
    data: [
        {name: '黑龙江', cities: [
            {name: '哈尔滨', code: '0451'},
            {name: '牡丹江', code: '0459'}
        ]},
        {name: '内蒙古', cities: [
            {name: '海拉尔', code: '0470'},
            {name: '呼伦贝尔', code: '0471'}
        ]}
    ],
    init: function(opts){
        var oProvince = document.querySelector(opts.provinceSelector);
        var oCity = document.querySelector(opts.citySelector);
        for(var i=0; i<this.data.length; i++){
            var province = this.data[i];
            var option = document.createElement('option');
            option.value = option.innerHTML = province.name;
            option.cities = province.cities;
            oProvince.appendChild(option);
        }
        oProvince.onchange = function(){
            /*for(var i=0; i<ganged.data.length; i++){
               if(this.value == ganged.data[i].name){
                   console.log(ganged.data[i].cities);
               }
            }*/
            oCity.innerHTML = '<option value="-1">请选择城市</option>';
            var cities = this.options[this.selectedIndex].cities;
            for(var i=0; i<cities.length; i++){
                var city = cities[i];
                var option = document.createElement('option');
                option.value = option.innerHTML = city.name;
                oCity.appendChild(option);
            }
        };
    }
};

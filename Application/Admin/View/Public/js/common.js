/**
 * Created by daivd on 2017/5/26.
 */
var app=angular.module('myApps',[]);
app.directive('select2', function (select2Query) {
    return {
        restrict: 'A',
        scope: {
            config: '=',
            ngModel: '=',
            select2Model: '='
        },
        link: function (scope, element, attrs) {
            // 初始化
            var tagName = element[0].tagName,
                config = {
                    allowClear: true,
                    multiple: !!attrs.multiple,
                    placeholder: attrs.placeholder || ' '   // 修复不出现删除按钮的情况
                };

            // 生成select
            if(tagName === 'SELECT') {
                // 初始化
                var $element = $(element);
                delete config.multiple;

                $element
                    .prepend('<option value=""></option>')
                    .val('')
                    .select2(config);

                // model - view
                scope.$watch('ngModel', function (newVal) {
                    setTimeout(function () {
                        $element.find('[value^="?"]').remove();    // 清除错误的数据
                        $element.select2('val', newVal);
                    },0);
                }, true);
                return false;
            }

            // 处理input
            if(tagName === 'INPUT') {
                // 初始化
                var $element = $(element);

                // 获取内置配置
                if(attrs.query) {
                    scope.config = select2Query[attrs.query]();
                }

                // 动态生成select2
                scope.$watch('config', function () {
                    angular.extend(config, scope.config);
                    $element.select2('destroy').select2(config);
                }, true);

                // view - model
                $element.on('change', function () {
                    scope.$apply(function () {
                        scope.select2Model = $element.select2('data');
                    });
                });

                // model - view
                scope.$watch('select2Model', function (newVal) {
                    $element.select2('data', newVal);
                }, true);

                // model - view
                scope.$watch('ngModel', function (newVal) {
                    // 跳过ajax方式以及多选情况
                    if(config.ajax || config.multiple) { return false }

                    $element.select2('val', newVal);
                }, true);
            }
        }
    }
});

/**
 * select2 内置查询功能
 */
app.factory('select2Query', function ($timeout) {
    return {
        testAJAX: function () {
            var config = {
                minimumInputLength: 1,
                ajax: {
                    url: "http://api.rottentomatoes.com/api/public/v1.0/movies.json",
                    dataType: 'jsonp',
                    data: function (term) {
                        return {
                            q: term,
                            page_limit: 10,
                            apikey: "ju6z9mjyajq2djue3gbvv26t"
                        };
                    },
                    results: function (data, page) {
                        return {results: data.movies};
                    }
                },
                formatResult: function (data) {
                    return data.title;
                },
                formatSelection: function (data) {
                    return data.title;
                }
            };

            return config;
        }
    }
});

app.controller('myCtrl',['$scope','$http','$timeout',function ($scope,$http,$timeout) {

    $scope.config1 = {
        data: [],
        placeholder: '尚无数据'
    };

    $timeout(function () {
        $scope.config1.data = [{id:1,text:'bug'},{id:2,text:'duplicate'},{id:3,text:'invalid'},{id:4,text:'wontfix'}]
        $scope.config1.placeholder = '加载完毕'
    }, 1000);


    $scope.config2 = [
        {id: 6, text: '来自ng-repeat'},
        {id: 7, text: '来自ng-repeat'},
        {id: 8, text: '来自ng-repeat'}
    ];

    $scope.config3 = {
        data: [{id:1,text:'bug'},{id:2,text:'duplicate'},{id:3,text:'invalid'},{id:4,text:'wontfix'}]
        // 其他配置略，可以去看看内置配置中的ajax配置
    };
    //console.log($scope.role);
    var url="{:U(MODULE_NAME.'/FileManage/getFileList')}";

    $http.get(url).then(function ($resp) {
        $scope.fileList=$resp.data;
    });
    $scope.createFileModel=function () {
        $scope.title="新建文件";
        $scope.act='createfile';
        $('#myModal').modal('show')
    }

    $scope.createFolderModel=function () {
        $scope.title="新建文件夹";
        $scope.act='createfolder';
        $('#myModal').modal('show')
    }



    $scope.addTopic=function () {
        //$addTopicUrl="{:U(MODULE_NAME.'/TopicManage/addTopic')}/act/"+act+'/name/'+$scope.file.name+'/path/'+$scope.fileList.path;
        $scope.title="新建专题";
        //$scope.act='createfile';
        $('#myModal').modal('show')

        //alert(11111)
    }

    $scope.types=[
        {id:1,name:'书单'},
        {id:2,name:'奖项'}
    ];
    $scope.classes=[
        {id:1,name:'文学'},
        {id:2,name:'法学'},
        {id:3,name:'公安'},
        {id:4,name:'经济'},
        {id:5,name:'金融'},
        {id:6,name:'法律'},
        {id:7,name:'hah'},

    ];


    $scope.createFile=function (act) {
        $createFileUrl="{:U(MODULE_NAME.'/FileManage/createFile')}/act/"+act+'/name/'+$scope.file.name+'/path/'+$scope.fileList.path;

        $http.get($createFileUrl).then(function ($resp) {

            if($resp.data.status){
                $http.get(url).then(function ($resp) {
                    $scope.fileList=$resp.data;
                });
                layer.alert($resp.data.msg)
                $('#myModal').modal('hide')
            }else{
                layer.alert($resp.data.msg)
            }

        })







    }

    $scope.deleteMessage=function () {

        obj=$('#home').find("input:checked");
        check_val = [];
        for(k in obj){
            if(obj[k].checked)
                check_val.push(obj[k].value);
        }
        if(check_val.length==0){
            layer.alert('您没有选择任何信息!');
            return false;
        }
        var strify = JSON.stringify(check_val);
        var deleteMessageUrl="{:U(MODULE_NAME.'/MessageManage/deleteMessage')}";
        $http({
            method:'post',
            url:deleteMessageUrl,
            data:$.param({data:strify}),
            headers:{'Content-type':'application/x-www-form-urlencoded'}
        }).then(function ($resp) {
            if ($resp.data.status){
                $http.get(url).then(function ($res) {
                    $scope.libMessages=$res.data;
                })
                layer.alert($resp.data.msg);
            }else{
                layer.alert($resp.data.msg);
            }

        })
    }

}])


/**
 * Created by daivd on 2017/5/27.
 */
"use strict"
//select2与指令结合使用
angular.module('myApps')
    .directive('select2', function (select2Query) {
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
// angular.module('myApps')
//     .directive('prettyprint', function() {
//         function replaceText(str)
//         {
//             var str1 = String(str);
//             return str1.replace(/\n/g,"<br/>");
//         }
//
//         return {
//         restrict: 'C',
//         link: function postLink(scope, element, attrs) {
//             element.html(prettyPrintOne(replaceText(element.html()),'',true));
//         }
//     };
// });
//angular-file-upload 图片回显指令
angular.module('myApps')
    .directive('ngThumb', ['$window', function($window) {
        var helper = {
            support: !!($window.FileReader && $window.CanvasRenderingContext2D),
            isFile: function(item) {
                return angular.isObject(item) && item instanceof $window.File;
            },
            isImage: function(file) {
                var type =  '|' + file.type.slice(file.type.lastIndexOf('/') + 1) + '|';
                return '|jpg|png|jpeg|bmp|gif|'.indexOf(type) !== -1;
            }
        };

        return {
            restrict: 'A',
            template: '<canvas/>',
            link: function(scope, element, attributes) {
                if (!helper.support) return;

                var params = scope.$eval(attributes.ngThumb);

                if (!helper.isFile(params.file)) return;
                if (!helper.isImage(params.file)) return;

                var canvas = element.find('canvas');
                var reader = new FileReader();

                reader.onload = onLoadFile;
                reader.readAsDataURL(params.file);

                function onLoadFile(event) {
                    var img = new Image();
                    img.onload = onLoadImage;
                    img.src = event.target.result;
                }

                function onLoadImage() {
                    var width = params.width || this.width / this.height * params.height;
                    var height = params.height || this.height / this.width * params.width;
                    canvas.attr({ width: width, height: height });
                    canvas[0].getContext('2d').drawImage(this, 0, 0, width, height);
                }
            }
        };
    }]);

//表格
angular.module('myApps')
    .directive('appBaoheTable',[function () {
        return {
            restrict:'E',
            templateUrl:"/notoadmin/view/template/baoheTable.html",
            //template:"<h1>good</h1>"
            scope:{
                // data:"=data",
                // buttonMotalData:"=",
                // backUrl:'=',
                // totalItem:'=',
                // buttonMotalConf:'=',
                // pageConf:'=',
                btnMotalPageConf:'='
            },
            controller:['$scope','$http',function ($scope,$http) {
                $scope.deleteItem=function ($id) {
                    //alert($id);
                    layer.confirm('你确定要删除此文件吗?', {icon: 3, title:'提示'}, function(index){
                        $http.get($scope.btnMotalPageConf.tableData.handle.delete+'/id/'+$id).then(function ($resp) {
                            if($resp.data.status){
                                layer.alert($resp.data.msg)
                                $scope.btnMotalPageConf.buttonMotalConf.onChange();//回调函数
                                //$('#myModal').modal('hide')
                            }else{
                                layer.alert($resp.data.msg)
                            }

                        })
                    })
                }


            }]
        }
    }])
//按钮模态框
//表格
angular.module('myApps')
    .directive('appBaoheButtonMotal',[function () {
        return {
            restrict:'E',
            templateUrl:"/notoadmin/view/template/baoheButtonMotal.html",
            //template:"<h1>good</h1>"
            scope:{
                // buttonText:"@buttonText",
                // motalTitle:"@",
                // motalItems:"=",
                // handleUrl:'@',
                // backUrl:'=',
                // refreshData:'=',
                // totalItem:'=',
                buttonMotalConf:'=',
                editId:'='
            },
            controller:['$scope','$http',function ($scope,$http) {
                $scope.returnValue={}

                $scope.clickButton=function () {
                    var id=$scope.editId?$scope.editId:'';//以便定位不同的Motal
                    $('#myModal_'+id).modal('show')
                    //alert($scope.editId)
                    if(id){
                        $http.get($scope.buttonMotalConf.getOneItemUrl+'/id/'+$scope.editId).then(function ($resp) {
                            $scope.returnValue=$resp.data;

                        })

                    }

                }

                $scope.addItem=function () {
                    //alert($scope.buttonMotalConf.backUrl)
                    var id=$scope.editId?$scope.editId:'';//以便定位不同的Motal

                    $http({
                        method:'post',
                        url:$scope.buttonMotalConf.handleUrl+'/id/'+$scope.editId,
                        data:$.param($scope.returnValue),
                        headers:{'Content-type':'application/x-www-form-urlencoded'}
                    }).then(function ($resp) {
                        if($resp.data.status){
                            layer.alert($resp.data.msg)
                            // $http.get($scope.buttonMotalConf.backUrl).then(function ($resp) {
                            //     $scope.buttonMotalConf.refreshData=$resp.data.result;
                            //     $scope.buttonMotalConf.totalItem=$resp.data.totalcount
                            // });
                            $scope.buttonMotalConf.onChange();//回调函数
                            $('#myModal_'+id).modal('hide')
                        }else{
                            layer.alert($resp.data.msg)
                        }

                    })
                    //alert($scope.handleUrl);
                }

            }]
        }
    }])

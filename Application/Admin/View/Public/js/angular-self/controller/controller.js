/**
 * Created by daivd on 2017/5/27.
 */


app.controller('topicManageIndexCtrl',['$scope','$http','$timeout',function ($scope,$http,$timeout) {

    $scope.paginationConf = {
        currentPage: 1,
        totalItems: 8000,
        itemsPerPage: 15,
        pagesLength: 10,
        perPageOptions: [10, 20, 30, 40, 50]

    };


    $scope.config3 = {
        data: [{id:1,text:'bug'},{id:2,text:'duplicate'},{id:3,text:'invalid'},{id:4,text:'wontfix'}]
        // 其他配置略，可以去看看内置配置中的ajax配置
    };



    $scope.paginationConf.onChange= function(){
        //alert($scope.paginationConf.itemsPerPage)
        url="http://localhost/notoadmin/index.php/Admin/TopicManage/getTopicList/page/"+$scope.paginationConf.currentPage+"/pagesize/"+$scope.paginationConf.itemsPerPage;

        $http.get(url).then(function ($resp) {
            $scope.topicList=$resp.data.result;
            $scope.paginationConf.totalItems=$resp.data.totalcount
        });
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

    $scope.addTopicHandler=function () {
        //alert('add')
        addTopicUrl="http://localhost/notoadmin/index.php/Admin/TopicManage/addTopic";
        $http({
            method:'post',
            url:addTopicUrl,
            data:$.param($scope.topic),
            headers:{'Content-type':'application/x-www-form-urlencoded'}
        }).then(function ($resp) {
            if($resp.data.status){
                layer.alert($resp.data.msg)
                $http.get(url).then(function ($resp) {
                    $scope.topicList=$resp.data.result;
                    $scope.paginationConf.totalItems=$resp.data.totalcount
                });
                $('#myModal').modal('hide')
            }else{
                layer.alert($resp.data.msg)
            }

        })


    }


    $scope.deleTopic=function (id) {
        deleteTopicUrl="http://localhost/notoadmin/index.php/Admin/TopicManage/deleteTopic/id/"+id
        $http.get(deleteTopicUrl).then(function ($resp) {
            if($resp.data.status){
                layer.alert($resp.data.msg);
                $http.get(url).then(function ($resp) {
                    $scope.topicList=$resp.data.result;
                    $scope.paginationConf.totalItems=$resp.data.totalcount
                });
            }else{
                layer.alert($resp.data.msg);
            }
        })

    }


}]);

//************************************************************文件管理控制器***********************************//
app.controller('fileManageIndexCtrl',['$scope','$http','$timeout',function ($scope,$http,$timeout) {

    //文件上传
    var uploadUrl=apiUrl+'Admin/FileManage/uploadFile';
    // var uploader = $scope.uploader = new FileUploader({
    //     url: uploadUrl
    // });
    //var dirpath=$scope.dirpath?$scope.dirpath:0;
    var url="http://localhost/notoadmin/index.php/Admin/FileManage/getFileList"

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

//创建文件
    $scope.createFile=function (act) {
        if(act=='createfile'){
            //创建文件
            $createFileUrl="http://localhost/notoadmin/index.php/Admin/FileManage/createFile/act/"+act;
            $http({
                method:'post',
                url:$createFileUrl,
                data:$.param({path:$scope.fileList.path,name:$scope.file.name}),
                headers:{'Content-type':'application/x-www-form-urlencoded'}
            }).then(function ($resp) {

                if($resp.data.status){
                    $http(
                        {
                            method:'post',
                            url:url,
                            data:$.param({path:$scope.fileList.path}),
                            headers:{'Content-type':'application/x-www-form-urlencoded'}
                        }
                    ).then(function ($resp) {
                        $scope.fileList=$resp.data;
                    });
                    layer.alert($resp.data.msg)
                    $('#myModal').modal('hide')
                }else{
                    layer.alert($resp.data.msg)
                }

            })


        }else if (act=='createfolder'){
            //创建文件夹
            //创建文件
            $createFolderUrl="http://localhost/notoadmin/index.php/Admin/FileManage/createFile/act/"+act;
            $http({
                method:'post',
                url:$createFolderUrl,
                data:$.param({path:$scope.fileList.path,name:$scope.file.name}),
                headers:{'Content-type':'application/x-www-form-urlencoded'}
            }).then(function ($resp) {

                if($resp.data.status){
                    $http(
                        {
                            method:'post',
                            url:url,
                            data:$.param({path:$scope.fileList.path}),
                            headers:{'Content-type':'application/x-www-form-urlencoded'}
                        }
                    ).then(function ($resp) {
                        $scope.fileList=$resp.data;
                    });
                    layer.alert($resp.data.msg)
                    $('#myModal').modal('hide')
                }else{
                    layer.alert($resp.data.msg)
                }

            })

        }else if(act=='renameFile'){
            //重命名文件
            //alert(apiUrl)
            //var oldname=$scope.file.oldname;

            var renameFileUrl=apiUrl+"Admin/FileManage/createFile/act/"+act;
            $http(
                {
                    method:'post',
                    url:renameFileUrl,
                    data:$.param({path:$scope.fileList.path,newname:$scope.file.name,oldname:$scope.file.oldname}),
                    headers:{'Content-type':'application/x-www-form-urlencoded'}
                }
            ).then(function ($resp) {
                if($resp.data.status){
                    $http(
                        {
                            method:'post',
                            url:url,
                            data:$.param({path:$scope.fileList.path}),
                            headers:{'Content-type':'application/x-www-form-urlencoded'}
                        }
                    ).then(function ($resp) {
                        $scope.fileList=$resp.data;
                    });
                    layer.alert($resp.data.msg)
                    $('#myModal').modal('hide')
                }else{
                    layer.alert($resp.data.msg)
                }

            })


        }else if(act=='renameFolder'){
            //重命名文件夹 其实和重命名问价一样
            var renameFileUrl=apiUrl+"Admin/FileManage/createFile/act/"+act;
            $http(
                {
                    method:'post',
                    url:renameFileUrl,
                    data:$.param({path:$scope.fileList.path,newname:$scope.file.name,oldname:$scope.file.oldname}),
                    headers:{'Content-type':'application/x-www-form-urlencoded'}
                }
            ).then(function ($resp) {
                if($resp.data.status){
                    $http(
                        {
                            method:'post',
                            url:url,
                            data:$.param({path:$scope.fileList.path}),
                            headers:{'Content-type':'application/x-www-form-urlencoded'}
                        }
                    ).then(function ($resp) {
                        $scope.fileList=$resp.data;
                    });
                    layer.alert($resp.data.msg)
                    $('#myModal').modal('hide')
                }else{
                    layer.alert($resp.data.msg)
                }

            })

        }

//                if(act==1){
//
//                    $createFileUrl="{:U(MODULE_NAME.'/FileManage/createFile')}/act/"+act;
//                    alert('file')
//
//                }else{
//                    alert('folder')
//
//                }





    }

//查看文件
    $scope.catFile=function (filename) {
        //alert(11111)
        // $('#imgdialog').position({
        //     of:$(window),
        // }).show('explode',1000);
        var fileExtension = filename.split('.').pop().toLowerCase();
        var imgArr=['jpg','jpeg','png','gif'];

        if($.inArray(fileExtension, imgArr)!=-1){
            $scope.title='图片内容';
            $('#imageShowMotal').find('img').attr('src','/'+$('#imageShowMotal').find('img').attr('src').split('/')[1]+'/'+$scope.fileList.path+'/'+filename  );
            $('#imageShowMotal').modal('show');
            return;
        }
        $scope.title='文件内容';
        $scope.act='catFile';
        var getFileContentUrl="http://localhost/notoadmin/index.php/Admin/FileManage/getFileContent";
        $http({
            method:'post',
            url:getFileContentUrl,
            data:$.param({path:$scope.fileList.path,filename:filename}),
            headers:{'Content-type':'application/x-www-form-urlencoded'}
        }).then(function ($resp) {
            //alert($resp.data)
            $scope.filecontent=$resp.data;
            //$scope.$apply();
            // $scope.$watch('filecontent',function (newValue,oldValue, scope) {
            //     prettyPrintOne(newValue,'',true)
            // })
            if(!$scope.filecontent){
                layer.alert('文件没有内容请编辑后查看!');
                return;
            }else{
                $('#modalid').modal('show');
            }

        })


    }

    //查看文件夹
    $scope.cateFolder=function (dirname) {
        var dirpath=$scope.fileList.path+'/'+dirname;
        //$scope.oldDirName=$scope.fileList.path.split('/').slice(-2,-1)[0];//把上层目录名存起来
        $scope.oldDirPath=$scope.fileList.path;//把上层目录名存起来 也可在后端用dirname操作返回数据这里用了纯前端
        //$scope.oldDirPath=
        //alert($scope.oldDir);
        //alert(filename);
        //$scope.fileList=$resp.data;
        //var newpath=$scope.fileList.path+'$'+dirname;
        //var newurl=apiUrl+"Admin/FileManage/getFileList/path/"+ newpath;
        // $http.get(newurl).then(function ($resp) {
        //     $scope.fileList=$resp.data;
        // });
        $http({
            method:'post',
            url:url,
            data:$.param({path:dirpath}),
            headers:{'Content-type':'application/x-www-form-urlencoded'}
        }).then(function ($resp) {
            $scope.fileList=$resp.data;
        })



    }
    //查看上层文件夹
    $scope.catePreFolder=function (oldDirPath) {
        var index = $scope.oldDirPath .lastIndexOf("\/");//找到最后一个目录所在的索引
        $scope.oldDirPath  = $scope.oldDirPath .substring( 0, index);//截取索引之前的路径同时更新上一层路径

        //alert($scope.oldDirPath);
        //$scope.oldDirPath=$scope.fileList.path;
        $http({
            method:'post',
            url:url,
            data:$.param({path:oldDirPath}),
            headers:{'Content-type':'application/x-www-form-urlencoded'}
        }).then(function ($resp) {
            $scope.fileList=$resp.data;
        })



    }

    //编辑文件内容模态框
    $scope.editFile=function (filename) {
        $scope.title='编辑文件';
        $scope.act='editFile';
        $scope.filename=filename;
        var getFileContentUrl="http://localhost/notoadmin/index.php/Admin/FileManage/getFileContent";
        $http({
            method:'post',
            url:getFileContentUrl,
            data:$.param({path:$scope.fileList.path,filename:filename}),
            headers:{'Content-type':'application/x-www-form-urlencoded'}
        }).then(function ($resp) {
            //alert($resp.data)
            $scope.filecontent=$resp.data;
            //$scope.$apply();
            // $scope.$watch('filecontent',function (newValue,oldValue, scope) {
            //     prettyPrintOne(newValue,'',true)
            // })

        });
        $('#modalid').modal('show');
    }
    //编辑文件提交
    $scope.editFileHandler=function (filename) {
        //alert(1111)
        var editFileHandlerUrl="http://localhost/notoadmin/index.php/Admin/FileManage/editFileHandler";
        $http({
            method:'post',
            url:editFileHandlerUrl,
            data:$.param({filecontent:$scope.filecontent,path:$scope.fileList.path,filename:filename}),
            headers:{'Content-type':'application/x-www-form-urlencoded'}

        }).then(function ($resp) {
            if($resp.data.status){
                layer.alert($resp.data.msg);
                $('#modalid').modal('hide');

            }else{
                layer.alert($resp.data.msg);
            }

        })

    }
    //重命名 操作在createFile中通过act 公用模态框
    $scope.renameFile=function (filename) {
        $scope.file={};
        $scope.title="重命名文件";
        $scope.act='renameFile';
        $scope.file.name=filename;
        $scope.file.oldname=filename;
        $('#myModal').modal('show')


    }


    //重命名文件夹 操作在createFile中通过act 公用模态框
    $scope.renameFolder=function (filename) {
        $scope.file={};
        $scope.title="重命名文件夹";
        $scope.act='renameFolder';
        $scope.file.name=filename;
        $scope.file.oldname=filename;
        $('#myModal').modal('show')


    }
    //删除 文件 ulink
    $scope.trashFile=function (filename) {
        layer.confirm('你确定要删除此文件吗?', {icon: 3, title:'提示'}, function(index){
            var trashFileUrl=apiUrl+'Admin/FileManage/deleteFile';
            $http({
                method:'post',
                url:trashFileUrl,
                data:$.param({path:$scope.fileList.path,filename:filename}),
                headers:{'Content-type':'application/x-www-form-urlencoded'}

            }).then(function ($resp) {
                if($resp.data.status){
                    layer.alert($resp.data.msg);
                    //回调刷新页面
                    $http(
                        {
                            method:'post',
                            url:url,
                            data:$.param({path:$scope.fileList.path}),
                            headers:{'Content-type':'application/x-www-form-urlencoded'}
                        }
                    ).then(function ($resp) {
                        $scope.fileList=$resp.data;
                    });
                }else{
                    layer.alert($resp.data.msg);
                }
            })
            layer.close(index);

        });


    }

    //删除文件夹 rmdir()删除空目录
    $scope.trashFolder=function (folderName) {


        layer.confirm('你确定要删除此文件夹吗?', {icon: 3, title:'提示'}, function(index){
            var trashFileUrl=apiUrl+'Admin/FileManage/deleteFolder';
            $http({
                method:'post',
                url:trashFileUrl,
                data:$.param({path:$scope.fileList.path,folderName:folderName}),
                headers:{'Content-type':'application/x-www-form-urlencoded'}

            }).then(function ($resp) {
                if($resp.data.status){
                    layer.alert($resp.data.msg);
                    //回调刷新页面
                    $http(
                        {
                            method:'post',
                            url:url,
                            data:$.param({path:$scope.fileList.path}),
                            headers:{'Content-type':'application/x-www-form-urlencoded'}
                        }
                    ).then(function ($resp) {
                        $scope.fileList=$resp.data;
                    });
                }else{
                    layer.alert($resp.data.msg);
                }
            })
            layer.close(index);

        });


    }
    //下载
    $scope.downloadFile=function (filename) {
        var downLoadFileUrl=apiUrl+'Admin/FileManage/downloadFile';
        //var fileExtension = filename.split('.').pop().toLowerCase();
        $http({
            method:'post',
            url:downLoadFileUrl,
            data:$.param({path:$scope.fileList.path,filename:filename}),
            headers:{'Content-type':'application/x-www-form-urlencoded'},
            responseType:'arraybuffer'

        }).then(function (data) {
            var file = new Blob([data.data], {type: 'application/text'}); // 使用Blob将PDF Stream 转换为file
            var myURL = window.URL || window.webkitURL;
            var fileUrl = myURL.createObjectURL(file);
            var a = document.createElement('a');
            a.href = fileUrl;
            a.target = '_blank';
            a.download = filename
            document.body.appendChild(a);
            a.click();
            
        })
    }


    //复制文件
    $scope.copyFile=function (filename) {
        $scope.title="复制文件";
        $scope.filename=filename;
        $scope.act='copyFile';

        //获得树形结构数据
        var getDataForTheTreeUrl=apiUrl+'Admin/FileManage/getDataForTheTree';
        $http({
            method:'post',
            url:getDataForTheTreeUrl,
            data:$.param({path:$scope.fileList.path}),
            headers:{'Content-type':'application/x-www-form-urlencoded'},

        }).then(function ($resp) {
            //初始化哦树形结构数据
            $scope.dataForTheTree =$resp.data;
        });
        $('#copyToWhere').modal('show');

    }

    //复制文件夹
    $scope.copyFolder=function (foldername) {
        $scope.title="复制文件夹";
        $scope.filename=foldername;
        $scope.act='copyFolder';
        //获得树形结构数据
        var getDataForTheTreeUrl=apiUrl+'Admin/FileManage/getDataForTheTree';
        $http({
            method:'post',
            url:getDataForTheTreeUrl,
            data:$.param({path:$scope.fileList.path}),
            headers:{'Content-type':'application/x-www-form-urlencoded'},

        }).then(function ($resp) {
            //初始化哦树形结构数据
            $scope.dataForTheTree =$resp.data;
        });
        $('#copyToWhere').modal('show');
    }

    //复制文件夹具体操作
    $scope.copyFileHandler=function (act) {
        //请求接口完成复制
        var copyFileUrl=apiUrl+'Admin/FileManage/copyFileHandler';
        $http({
            method:'post',
            url:copyFileUrl,
            data:$.param({dest: $scope.selectedNode+'/'+$scope.filename,act:act,src:$scope.fileList.path+'/'+$scope.filename}),//$scope.showSelected获得
            headers:{'Content-type':'application/x-www-form-urlencoded'},

        }).then(function ($resp) {
            if($resp.data.status){
                layer.alert($resp.data.msg);
                $('#copyToWhere').modal('hide');
                //刷新数据
                $http({
                    method:'post',
                    url:url,
                    data:$.param({path:$scope.fileList.path}),
                    headers:{'Content-type':'application/x-www-form-urlencoded'}
                }).then(function ($resp) {
                    $scope.fileList=$resp.data;
                });
                //隐藏模态

            }else{
                layer.alert($resp.data.msg);
            }
        });


    }



    //tree
    $scope.treeOptions = {
        nodeChildren: "children",
        dirSelectable: true,
        injectClasses: {
            ul: "a1",
            li: "a2",
            liSelected: "a7",
            iExpanded: "a3",
            iCollapsed: "a4",
            iLeaf: "a5",
            label: "a6",
            labelSelected: "a8"
        }
    }
    // $scope.dataForTheTree =
    //     [
    //         { "name" : "Joe", "age" : "21", "children" : [
    //             { "name" : "Smith", "age" : "42", "children" : [] },
    //             { "name" : "Gary", "age" : "21", "children" : [
    //                 { "name" : "Jenifer", "age" : "23", "children" : [
    //                     { "name" : "Dani", "age" : "32", "children" : [] },
    //                     { "name" : "Max", "age" : "34", "children" : [] }
    //                 ]}
    //             ]}
    //         ]},
    //         { "name" : "Albert", "age" : "33", "children" : [] },
    //         { "name" : "Ron", "age" : "29", "children" : [] }
    //     ];


    //获得树形结构中被选中的路径
    $scope.showSelected = function(sel) {
        $scope.selectedNode = sel;
        //$scope.fuzhidao=$scope.selectedNode;
    };



    //剪切文件夹 操作在copytowherehandler act识别
    $scope.cutFolder=function (folderName) {
        $scope.title="剪切文件夹";
        $scope.filename=folderName;
        $scope.act='cutFolder';
        //获得树形结构数据
        var getDataForTheTreeUrl=apiUrl+'Admin/FileManage/getDataForTheTree';
        $http({
            method:'post',
            url:getDataForTheTreeUrl,
            data:$.param({path:$scope.fileList.path}),
            headers:{'Content-type':'application/x-www-form-urlencoded'},

        }).then(function ($resp) {
            //初始化哦树形结构数据
            $scope.dataForTheTree =$resp.data;
        });
        //显示树形结构模态框
        $('#copyToWhere').modal('show');

    }

    //剪切文件
    $scope.cutFile=function (filename) {
        $scope.title="剪切文件夹";
        $scope.filename=filename;
        $scope.act='cutFile';
        //获得树形结构数据
        var getDataForTheTreeUrl=apiUrl+'Admin/FileManage/getDataForTheTree';
        $http({
            method:'post',
            url:getDataForTheTreeUrl,
            data:$.param({path:$scope.fileList.path}),
            headers:{'Content-type':'application/x-www-form-urlencoded'},

        }).then(function ($resp) {
            //初始化哦树形结构数据
            $scope.dataForTheTree =$resp.data;
        });
        //显示树形结构模态框
        $('#copyToWhere').modal('show');
    }

    //上传motal
    $scope.uploadFileMotal=function () {
        //$scope.file={}
        $('#uploadFile').modal('show');
    }
    //上传handler
    $scope.uploadFileHandler=function () {
        //var value=$('#uploadfilevalue').val()
        var path=$scope.fileList.path;
        //var file=document.querySelector('input[type=file]').files[0];
        var file=document.getElementById('uploadfilevalue').files[0];
        var fm=new FormData();
        fm.append('path', path);
        fm.append('myFile', file);

        $http({
            method:'post',
            url:uploadUrl,
            data:fm,
            headers: {
                'Content-Type': undefined //这个必须的
            }

        }).then(function ($resp) {
            if($resp.data.status){
                $http(
                    {
                        method:'post',
                        url:url,
                        data:$.param({path:$scope.fileList.path}),
                        headers:{'Content-type':'application/x-www-form-urlencoded'}
                    }
                ).then(function ($resp) {
                    $scope.fileList=$resp.data;
                });
                layer.alert($resp.data.msg)
                $('#uploadFile').modal('hide')
            }else{
                layer.alert($resp.data.msg)
            }
        });

        //console.log(fm)
    }










}]);
//************************************************************添加角色控制器***********************************//

app.controller('rbacAddRoleCtrl',['$scope','$http','$timeout',function ($scope,$http,$timeout) {
    $scope.role={};
    $scope.role.status=1;
    $scope.addRole=function () {
        //console.log($scope.role);
        var url="http://localhost/notoadmin/index.php/Admin/Rbac/addRoleHandle"

        //alert(url);
        $http({
            method:'post',
            url:url,
            data:$.param($scope.role),
            headers:{'Content-type':'application/x-www-form-urlencoded'}
        }).then(function ($resp) {
            if ($resp.data.status){
                layer.alert($resp.data.msg);
                //window.location.href="{:U(MODULE_NAME.'/Rbac/ManageRole')}";
                //location.reload();
                $scope.role={};

            }else{
                layer.msg($resp.data.msg);
            }

        })
    }

}]);

//************************************************************角色管理控制器***********************************//

app.controller('rbacManageRoleCtrl',['$scope','$http','$timeout',function ($scope,$http,$timeout) {
    $scope.nodeClickEvent=function($event,id,level){
        var checkbox = $event.target;

        if(level==1){
            var str='_';
            var inputs=$('input[value*='+str+']');
            //console.log(inputs)
            $(checkbox).attr('checked')?inputs.attr('checked','checked'):inputs.removeAttr('checked');

        }
        if(level==2){
            var id=$(checkbox).attr('id');//意思就是所有父节点为此id的选中
            //$(this).attr('checked')?$('input[id='+pid+']').attr('checked',true):$('input[id='+pid+']').removeAttr('checked');
            var inputs=$('input[pid='+id+']');
            $(checkbox).attr('checked')?inputs.attr('checked',true):inputs.removeAttr('checked');


        }

        if(level==3){
            if($(checkbox).attr('checked')){
                var pid=$(checkbox).attr('pid');//相反
                $('input[id='+pid+']').attr('checked',true);
                var ppid=$('input[id='+pid+']').attr('pid');
                $('input[id='+ppid+']').attr('checked',true);

            }


        }
        //$scope.$apply();

    }


    //根据role的level确定类型
    $scope.leixing=[
        {value:1,name:'项目'},
        {value:2,name:'模块'},
        {value:3,name:'方法'}
    ]
    //获得角色列表
    $http.get("http://localhost/notoadmin/index.php/Admin/Rbac/manageRole/action/getRoleList").then(function ($resp) {
        $scope.roleList=$resp.data;
    })



    $scope.node={};
    $scope.node.status=1;
    $scope.addNode=function () {
        //console.log($scope.node);
        var url="http://localhost/notoadmin/index.php/Admin/Rbac/addRoleHandle"

        //alert(url);
        $http({
            method:'post',
            url:url,
            data:$.param($scope.node),
            headers:{'Content-type':'application/x-www-form-urlencoded'}
        }).then(function ($resp) {
            if ($resp.data.status){
                layer.alert($resp.data.msg);
                $scope.node={};
                $http.get("http://localhost/notoadmin/index.php/Admin/Rbac/manageRole/action/getRoleList").then(function ($resp) {
                    $scope.roleList=$resp.data;
                })

            }else{
                layer.msg($resp.data.msg);
            }

        })
    }
    //给角色添加权限模态框
    $scope.addNodeToRole=function (name,id) {
        //获得节点列表
        $http.get("http://localhost/notoadmin/index.php/Admin/Rbac/manageRole/action/getNodeListAcess/role_id/"+id).then(function ($resp) {
            $scope.nodeList=$resp.data;
            console.log($scope.nodeList)
        })
        //alert(1111)
        $scope.rolenow=name;
        $scope.role_id=id;
        $('#modalid').modal('show');

    }
    //添加权限接口调用
    $scope.addAccess=function () {
        //obj = document.getElementsByName("access[]");
        obj=$('#modalid').find("input:checked");
        //alert(obj.length);
        check_val = [];
        for(k in obj){
            if(obj[k].checked)
                check_val.push(obj[k].value);
        }
//            var new_arr=[];
//            for(var i=0;i<check_val.length;i++) {
//                var items=check_val[i];
//                //判断元素是否存在于new_arr中，如果不存在则插入到new_arr的最后
//                if($.inArray(items,new_arr)==-1) {
//                    new_arr.push(items);
//                }
//            }
        //alert(check_val)
        //var access=$('#myAccessForm').find("[name*='access']").val();
        //console.log(check_val);
        var strify = JSON.stringify(check_val);
        var url="http://localhost/notoadmin/index.php/Admin/Rbac/manageRole/action/addAccess"
        $http({
            method:'post',
            url:url,
            data:$.param({access:strify,role_id:$scope.role_id}),
            headers:{'Content-type':'application/x-www-form-urlencoded'}
        }).then(function ($resp) {
            if ($resp.data.status){
                layer.alert($resp.data.msg);
                $('#modalid').modal('hide');
                //获得节点列表
//                    $http.get("{:U(MODULE_NAME.'/Rbac/manageAdmin')}/action/getNodeListAcess/role_id/"+$scope.role_id).then(function ($resp) {
//                        $scope.nodeList=$resp.data;
//                    })


            }else{
                layer.msg($resp.data.msg);
            }

        })





    }

}]);

//************************************************************权限管理控制器***********************************//

app.controller('rbacManageNodeCtrl',['$scope','$http','$timeout',function ($scope,$http,$timeout) {



    $scope.leixing=[
        {value:1,name:'项目'},
        {value:2,name:'模块'},
        {value:3,name:'方法'}
    ]
    //获取nodelist异步请求
    $http.get("http://localhost/notoadmin/index.php/Admin/Rbac/manageNode/action/getNodeList").then(function ($resp) {
        $scope.nodeList=$resp.data;
    });
    //分页开始
    // $scope.paginationConf = {
    //     currentPage: 1,
    //     totalItems: 8000,
    //     itemsPerPage: 15,
    //     pagesLength: 10,
    //     perPageOptions: [10, 20, 30, 40, 50]
    //
    // };
    //
    //
    // $scope.paginationConf.onChange= function(){
    //     //alert($scope.paginationConf.itemsPerPage)
    //     url="http://localhost/notoadmin/index.php/Admin/Rbac/manageNode/action/getNodeList/page/"+$scope.paginationConf.currentPage+"/pagesize/"+$scope.paginationConf.itemsPerPage;
    //
    //     $http.get(url).then(function ($resp) {
    //         $scope.nodeList=$resp.data.result;
    //         $scope.paginationConf.totalItems=$resp.data.totalcount
    //     });
    // }
    // //分页结束


    //获取父节点异步请求
    $http.get("http://localhost/notoadmin/index.php/Admin/Rbac/manageNode/action/getPidNodeList").then(function ($resp) {
        $scope.nodePidList=$resp.data;
    })

    $scope.node={};
    $scope.node.status=1;
    $scope.node.pid=1;
    $scope.addNode=function () {
        //console.log($scope.node);
        var url="http://localhost/notoadmin/index.php/Admin/Rbac/manageNode/action/addNode"

        //alert(url);
        $http({
            method:'post',
            url:url,
            data:$.param($scope.node),
            headers:{'Content-type':'application/x-www-form-urlencoded'}
        }).then(function ($resp) {
            if ($resp.data.status){
                layer.alert($resp.data.msg);
                //获取nodelist异步请求
                $http.get("http://localhost/notoadmin/index.php/Admin/Rbac/manageNode/action/getNodeList").then(function ($resp) {
                    $scope.nodeList=$resp.data;
                })
                //获取父节点异步请求
                $http.get("http://localhost/notoadmin/index.php/Admin/Rbac/manageNode/action/getPidNodeList").then(function ($resp) {
                    $scope.nodePidList=$resp.data;
                })
                //window.location.href="{:U(MODULE_NAME.'/Rbac/ManageRole')}";
                //location.reload();
                $('#myModal').modal('hide');

                $scope.node={};
                $scope.node.status=1;

            }else{
                layer.msg($resp.data.msg);
            }

        })
    }

    $scope.deleteNode=function (id) {

        layer.confirm('确定要删除此用吗?', {icon: 3, title:'提示'}, function(){
            //do something

            $http.get("http://localhost/notoadmin/index.php/Admin/Rbac/manageNode/action/deleteNode/id/"+id).then(function ($resp) {
                if ($resp.data.status){
                    layer.alert($resp.data.msg);
                    //获取nodelist异步请求
                    $http.get("http://localhost/notoadmin/index.php/Admin/Rbac/manageNode/action/getNodeList").then(function ($resp) {
                        $scope.nodeList=$resp.data;
                    })
                    //获取父节点异步请求
                    $http.get("http://localhost/notoadmin/index.php/Admin/Rbac/manageNode/action/getPidNodeList").then(function ($resp) {
                        $scope.nodePidList=$resp.data;
                    })

                }else{
                    layer.msg($resp.data.msg);
                }
            })

            //alert(id)
        });
    }

}]);

//************************************************************官员管理控制器***********************************//

app.controller('rbacManageAdminCtrl',['$scope','$http','$timeout',function ($scope,$http,$timeout) {
    //获取adminlist异步请求
    $http.get("http://localhost/notoadmin/index.php/Admin/Rbac/manageAdmin/action/getAdminList").then(function ($resp) {
        $scope.adminList=$resp.data;
    })
    //获取父节点异步请求
    $http.get("http://localhost/notoadmin/index.php/Admin/Rbac/manageRole/action/getRoleList").then(function ($resp) {
        $scope.roleList=$resp.data;
    })

    $scope.admin={};
    //添加官员
    $scope.addAdmin=function () {
        //console.log($scope.node);
        var url="http://localhost/notoadmin/index.php/Admin/Rbac/manageAdmin/action/addAdmin";

        //alert($);
        $http({
            method:'post',
            url:url,
            data:$.param($scope.admin),
            headers:{'Content-type':'application/x-www-form-urlencoded'}
        }).then(function ($resp) {
            if ($resp.data.status){
                layer.alert($resp.data.msg);
                $http.get("http://localhost/notoadmin/index.php/Admin/Rbac/manageAdmin/action/getAdminList").then(function ($resp) {
                    $scope.adminList=$resp.data;
                });
                //window.location.href="{:U(MODULE_NAME.'/Rbac/ManageRole')}";
                //location.reload();
                $('#myModal').modal('hide');

                $scope.admin={};

            }else{
                layer.msg($resp.data.msg);
            }

        })
    }
    //删除官员
    $scope.deleteAdmin=function (id) {

        layer.confirm('确定要删除此用吗?', {icon: 3, title:'提示'}, function(){
            //do something

            $http.get("http://localhost/notoadmin/index.php/Admin/Rbac/manageAdmin/action/deleteAdmin/id/"+id).then(function ($resp) {
                if ($resp.data.status){
                    layer.alert($resp.data.msg);
                    $http.get("http://localhost/notoadmin/index.php/Admin/Rbac/manageAdmin/action/getAdminList").then(function ($resp) {
                        $scope.adminList=$resp.data;
                    });

                }else{
                    layer.msg($resp.data.msg);
                }
            })
        });

    }
    //编辑官员
    $scope.editAdmin=function (id) {
        $('#myModal').modal('show');
        $http.get("http://localhost/notoadmin/index.php/Admin/Rbac/manageAdmin/action/getOneAdmin/id/"+id).then(function ($resp) {
            $scope.admin=$resp.data;

        })

    }

}]);







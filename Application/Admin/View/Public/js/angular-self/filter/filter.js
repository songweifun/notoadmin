/**
 * Created by daivd on 2017/5/28.
 */
angular.module('myApps')
    .filter('prettyprint', function () {
    return function (text) {
        return prettyPrintOne(text, '', true);
    };
});

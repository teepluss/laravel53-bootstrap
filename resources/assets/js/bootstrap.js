
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');
require('vue-resource');

/**
 * We'll register a HTTP interceptor to attach the "CSRF" header to each of
 * the outgoing requests issued by this application. The CSRF middleware
 * included with Laravel will automatically verify the header's value.
 */
Vue.http.interceptors.push((request, next) => {
    request.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;
    request.headers['Accept'] = 'application/json';
    request.headers['Content-Type'] = 'application/json';
    request.headers['Authorization'] = 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImMzODdkMmI1ZWFlZDgzNDBhNmY4OTUwYzkxNzQ2NTFkNzhhMjkxMTFmYmQ2N2EwNzkwMjY1OWNjNmQyYzA5ZjYyNWZlYzNkYmQ2OWFhNWM5In0.eyJhdWQiOiI1IiwianRpIjoiYzM4N2QyYjVlYWVkODM0MGE2Zjg5NTBjOTE3NDY1MWQ3OGEyOTExMWZiZDY3YTA3OTAyNjU5Y2M2ZDJjMDlmNjI1ZmVjM2RiZDY5YWE1YzkiLCJpYXQiOjE0NzI4MTIwMzUsIm5iZiI6MTQ3MjgxMjAzNSwiZXhwIjo0NjI4NDg1NjM1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.D-bKkm2jiplRQejx27cNJhuNHanckghJkhO-uhpJYiiOv4lPIIJERXj5r_3lXcSO0HTYC2A9LSZKr5n6_fwRGWuM9FT1X2A9xJM0-mCMbmOVyAcKhnHnJTdXWIqlFSKUz2RnLDhNWD8X3piFHX2jAnBgu2g02jgqdwMqB9fDhwjcTf-zIG9YB7y5UOVleUOg07_w8bGFZ0-Wd-81MOUuH-j468cnLTvs_gblbfHsJ7SlvcgTRQBASXuV9pqTIsGMECZZPIaTj3qEUrFKkedNGgufGQdhc-DGLJrQ9oSVwQ45vSa9CjphZzmw7I8aKm6Uo_7Orem6x4LlLIWMG4ZwGNCGYkJFd3HS_TKVXYMRk8W82pCdL4DwUTuRQh2vAKflfVoXe6JvgDiHFzsAYOPNcyviCBecTgJaC22CXY8G03fPedT2vEL2OIWXvIr-CTMxhpZeHY6w75Im_0WfnCJ6NVYifYEGL8QooExH5ADJseCoHtrMtKPNfynv1Jf5KqrjUZ4ENSUqI1vOuWi2q0TnwO57hn1ldERs24gekmEcqYPQc4w2O4r-hQpJhvL5JS0P5GOiBQ_-lFwu58BdPAbkDJisIBMZDZZq3qf_Tbcx2l2XKMBIRgI9bjUbAB1w1lTfGz8vgbIWgQIUfGU_f7YK08HQ9E7eFPHPe_edpAeZNe8';

    next();
});

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from "laravel-echo"

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });

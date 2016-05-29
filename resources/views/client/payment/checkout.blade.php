@extends('client.app')

@section('content')
    <div id="checkout">
        <div ng-app="app" class="container">
            <form ng-controller="PaymentFormCtrl" class="payment-form" name="paymentForm">
                <div class="notification">
                    <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSIzMnB4IiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAzMiAzMiIgd2lkdGg9IjMycHgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6c2tldGNoPSJodHRwOi8vd3d3LmJvaGVtaWFuY29kaW5nLmNvbS9za2V0Y2gvbnMiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48dGl0bGUvPjxkZXNjLz48ZGVmcy8+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIiBpZD0iUGFnZS0xIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSI+PGcgZmlsbD0iIzkyOTI5MiIgaWQ9Imljb24tMTE0LWxvY2siPjxwYXRoIGQ9Ik0xNiwyMS45MTQ2NDcyIEwxNiwyNC41MDg5OTQ4IEMxNiwyNC43ODAxNjk1IDE2LjIzMTkzMzYsMjUgMTYuNSwyNSBDMTYuNzc2MTQyNCwyNSAxNywyNC43NzIxMTk1IDE3LDI0LjUwODk5NDggTDE3LDIxLjkxNDY0NzIgQzE3LjU4MjU5NjIsMjEuNzA4NzI5IDE4LDIxLjE1MzEwOTUgMTgsMjAuNSBDMTgsMTkuNjcxNTcyOCAxNy4zMjg0MjcyLDE5IDE2LjUsMTkgQzE1LjY3MTU3MjgsMTkgMTUsMTkuNjcxNTcyOCAxNSwyMC41IEMxNSwyMS4xNTMxMDk1IDE1LjQxNzQwMzgsMjEuNzA4NzI5IDE2LDIxLjkxNDY0NzIgTDE2LDIxLjkxNDY0NzIgTDE2LDIxLjkxNDY0NzIgWiBNMTUsMjIuNTAwMTgzMSBMMTUsMjQuNDk4MzI0NCBDMTUsMjUuMzI3Njc2OSAxNS42NjU3OTcyLDI2IDE2LjUsMjYgQzE3LjMyODQyNzEsMjYgMTgsMjUuMzI4ODEwNiAxOCwyNC40OTgzMjQ0IEwxOCwyMi41MDAxODMxIEMxOC42MDcyMjM0LDIyLjA0NDA4IDE5LDIxLjMxNzkwOSAxOSwyMC41IEMxOSwxOS4xMTkyODgxIDE3Ljg4MDcxMTksMTggMTYuNSwxOCBDMTUuMTE5Mjg4MSwxOCAxNCwxOS4xMTkyODgxIDE0LDIwLjUgQzE0LDIxLjMxNzkwOSAxNC4zOTI3NzY2LDIyLjA0NDA4IDE1LDIyLjUwMDE4MzEgTDE1LDIyLjUwMDE4MzEgTDE1LDIyLjUwMDE4MzEgWiBNOSwxNC4wMDAwMTI1IEw5LDEwLjQ5OTIzNSBDOSw2LjM1NjcwNDg1IDEyLjM1Nzg2NDQsMyAxNi41LDMgQzIwLjYzMzcwNzIsMyAyNCw2LjM1NzUyMTg4IDI0LDEwLjQ5OTIzNSBMMjQsMTQuMDAwMDEyNSBDMjUuNjU5MTQ3MSwxNC4wMDQ3NDg4IDI3LDE1LjM1MDMxNzQgMjcsMTcuMDA5NDc3NiBMMjcsMjYuOTkwNTIyNCBDMjcsMjguNjYzMzY4OSAyNS42NTI5MTk3LDMwIDIzLjk5MTIxMiwzMCBMOS4wMDg3ODc5OSwzMCBDNy4zNDU1OTAxOSwzMCA2LDI4LjY1MjYxMSA2LDI2Ljk5MDUyMjQgTDYsMTcuMDA5NDc3NiBDNiwxNS4zMzk1ODEgNy4zNDIzMzM0OSwxNC4wMDQ3MTUyIDksMTQuMDAwMDEyNSBMOSwxNC4wMDAwMTI1IEw5LDE0LjAwMDAxMjUgWiBNMTAsMTQgTDEwLDEwLjQ5MzQyNjkgQzEwLDYuOTA4MTcxNzEgMTIuOTEwMTQ5MSw0IDE2LjUsNCBDMjAuMDgyNTQ2Miw0IDIzLDYuOTA3MjA2MjMgMjMsMTAuNDkzNDI2OSBMMjMsMTQgTDIyLDE0IEwyMiwxMC41MDkwNzMxIEMyMiw3LjQ2NjQ5NjAzIDE5LjUzMTM4NTMsNSAxNi41LDUgQzEzLjQ2MjQzMzksNSAxMSw3LjQ2MTQwMjg5IDExLDEwLjUwOTA3MzEgTDExLDE0IEwxMCwxNCBMMTAsMTQgWiBNMTIsMTQgTDEyLDEwLjUwMDg1MzcgQzEyLDguMDA5MjQ3OCAxNC4wMTQ3MTg2LDYgMTYuNSw2IEMxOC45ODAyMjQzLDYgMjEsOC4wMTUxMDA4MiAyMSwxMC41MDA4NTM3IEwyMSwxNCBMMTIsMTQgTDEyLDE0IEwxMiwxNCBaIE04Ljk5NzQyMTkxLDE1IEM3Ljg5NDI3NjI1LDE1IDcsMTUuODk3MDYwMSA3LDE3LjAwNTg1ODcgTDcsMjYuOTk0MTQxMyBDNywyOC4xMDE5NDY1IDcuODkwOTI1MzksMjkgOC45OTc0MjE5MSwyOSBMMjQuMDAyNTc4MSwyOSBDMjUuMTA1NzIzOCwyOSAyNiwyOC4xMDI5Mzk5IDI2LDI2Ljk5NDE0MTMgTDI2LDE3LjAwNTg1ODcgQzI2LDE1Ljg5ODA1MzUgMjUuMTA5MDc0NiwxNSAyNC4wMDI1NzgxLDE1IEw4Ljk5NzQyMTkxLDE1IEw4Ljk5NzQyMTkxLDE1IFoiIGlkPSJsb2NrIi8+PC9nPjwvZz48L3N2Zz4="  class="notification__icon"/>
      <span class="notification__text">
      Мы не храним ваши платежные данные, а сразу передаем их по зашифрованному каналу платежной системе
      </span>
                </div>
                <div class="card-type clearfix">
                    <div class="card-type__label">
                        Введите данные карты
                    </div>
                    <div class="card-type__icons">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAAOCAYAAABZ/o57AAAAAXNSR0IArs4c6QAABLJJREFUSA2tVk1sVFUUPue+9+ZHZ94wibWmBTL2tSCVxBjF8LOQhUsWmmriQsPCNGFDGlphYYiZBGOt2EwLJhhjUNxIohsShVaDRhMrMUGjFVDT6Q8goRqhPzOlPzPv+p335s5MBVZ6knfP7z333PNzZziWyWVIl5jqwLapWMjv/7NOFJJN2Xti0USDkS9O/H4t3uw12vHIOpH5ZX+hONHzk9EHOJONJfxEi7KdDHHZ98m6WsjfvEiU9VfZCdPyRipO8ZSQt4rLf9P0/qLQAiqiVHvEiRyKOpGf8Y3LZ3FkOtU6cDw0qa1ufE1v1HIm5Yso5xxRE9ux6EFFakQ+y7LfNNap9b3plJfrS9npaSviXGBFnzFbZyym0ZSXHjZ2BrvewLGUis9EFE3J5yadA0YnWM2Nd52eG+t6YXbhZmNZ65Oa9LIotKbddF9fUugAkBkmftGwMDiGrCyjFJurMp9+CeiGbEI78WFiJYe5Vb0hWE8ZUrCb6d/KzHvqZaC31fOqylzLLljEb5HmeU2Ux0aVSNmPG72rUh3ElBYe+iWfV94RGsFXA4U8CDTppvZg/xbRAwo++Z3oiy0ln57ytT5Q9vXpUBWubNs99bzQrPkJJKIan11vMJvv+sFtHfRZ6yaYTjHZcthXwUalOqu22j8pPRz3+tch0qCnAhvSQaCKeIexRYWuzI/NfijZr8jOGp1gmRFU7xmWKdH6MvxZOLtZ/Ca8dHshH16+GnFlM5KiUTKOg3CZ9SMiT7b0bwB6smJDpZI/KLRDqpZNRDRXXLkY2vCYsUXGN7leejTRMtBhZPU4YnMXgkRwOJnpAyD0fghMulr+fweK0dVDYobNaa11MM2K7Vo2SX+zMNXzo9jourLjUhNmSvVSuRdxXxIbAfjaYCn+xPUGv403960NpVgx5UjkS8LjLH+5XDrua/rO6BXX+vS2QP2FW5+jFEioHMDb4s1H1uKmu81m9FeQzUBfN0jYEw4SFHNXu2/MjeUfxdmH4GjJ7EXA251Y9EuivVGRJTmKBLAZ2C8WJ17GkOlqRpGIu2e0cP2Vv2B8XhyhbLYT06/j1uHbqWmqMD5ySnQCkNdKXxmkUCPr0aW5/L5XV3SpDZcIqiRSXL7NbfV2omdt9PJekQnA12Vk/HmQbYFAFk0b5ZkT8raMihBQ55iqTxKm922ij8uhSTCRm0I6uNRoQGdya4xM8K18zxUEcbBehjIX0LfPIur1VTlzJzL+kWL1vpGBZ+3Etgq/auqNASo/BJtVznG94nyZ3jM2bkvaQxrihsfPTFB611bD7A1iOPyzWvN19O4DaJ0OBBsAfN+Yz1/63vXac0EejYO7Yyn/mTsGOp8fOZfydszgxtXsoNdO0OS+GeMPh2+uHU4rhfyF36BDEvTDWO9FsR4DIyIpawBogUXt+08nH3xIHnjzzlK5VN5ZwnNYMaOIxbugPyo8kwr69I6BSnk1bUcv8i5kEjFiLdMRwQbQMw1Q/BrwWo8TvbtCjYcRIA1hh7yjjUHp5I+E5j+QyVPLZZ1bnOyexM/lCfTfbOhLny9Mdn8d0pU1k/s0avFrFf1GYHPXVWb/E5O1E97h+4meC97I/+r0H2FHmUxT7+LTAAAAAElFTkSuQmCC" class="card-type__icon card-type__icon--disabled" ng-class="{'card-type__icon--disabled': !isVisa()}" />
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB8AAAAUCAYAAAB1aeb6AAAAAXNSR0IArs4c6QAABABJREFUSA2VlW1ollUYx3/3NqduavlSyy3TTNecLy1RyxXMhBl9iJFazrcIIjKhzH2Q8MMMkdbLB0n60AsUZUQg+EItNPBjTjBMRytCnVubiZuxTXHNbe7ud/bwPDhm7dkFF+c+53r7n/+5zrkj/kNiiDQtUB9QJ6pX1HoX/3a8o8TfkEcmxWQ4xlxngGYqaTDGdMMlFBgiek1z4S11gzp9iBHTQZ36gYFHkrb4AM+bfrtwH3dtaM6YS658TS/vRRvpSMaEcYijhde49rk6KRhHkGM8y5ts5mOzlI3gG/beIfQXo0q+T/qmilt4q4sfqam1pNMdx4h2auhjFvlSnZ7Elo95JVo3uMFEIQuvNPpHNd00A2SbJkP/h43aqWao6Ugs4JinBPBTZOEsY35VQ5r0pJAT7KA05TzGr5zUbOSPmLP8xuJQfJ3e344ckfIY4C6xR7exdI+2d1L29D5iKsKuVzNvHpSX22r22qZN0NQER48OT5KbC1MnNLLjypxhxpuu3LdMfRrajnshTwxzSS3Mtr0ufvJc2Hkj1dUPsmuXMFbDwYOwd69n6CGGYnv2wNq1sHAhXLjgffBCrF8PVVVw3CKtrbDMoouuwsYPoXm/hetgymMeqGdx3h7Or4DO03D3Yui/7gF7k2vzGzLfhnfZujWLMR5cXp4BklFbK6RGWLUKiopgyxaoqYEVK6ChwQazw+osUF0NN91yZaVAvZ03vtOurftPW1fgecZPmAuzX/WF6JU1AY0vEECX7H6VFXq0h/nz4bTIZs6Evj4o0GHbtsRYXw8nTybm4XgOHYI5sh6YCDsvLobduwUt+O4m0yn3vwBzjQ+FMsfBJdnMMXfjp9BxCq79Hrx6MsjObmW6D9m5c3D4cCJxfr40dYp0KsyYAe3tMHlyYl5WlqC/pycREwCdOQN/GFuyD0rd/RSPobcDxk6zuNR3au9Si2Vq7na4bq3MiX9FcU7OPtG/TlubtN2AwsIEtWFHYR4kgDsl4gCqvz8m93LEo6Xu6KKF7oVfbK43bpl4aWKnnWd9I43vNz6SkX9aZLRL3yWO1zwq+6Pvxvuh4TwI5HUUstkmncXsVIQEIcOjkPDUlAw+pQKQMypGEXyLRd7z5EO8xkjZT1vizAOXx5e8lCwun8ir73S6spyfWc4SigywHUYhzXSPf+J8V8HVJHafLEpM8IPqAacpj0j/TukPdyYdiWmhn2eiDTQE91SYKGxH7JhBAMH2f9Kp8bXoLA85VoncLhpRjlh4abJw8E7t/PZQWXjSue8s5ap3DVt2sEAA6F3iMwNt34TEXzLVH8vLzioEssCskxx7nbc4HlP3+x8fXVOH1AIJN2Js+E5X4i8YF+JG8v8X5UMlkwCffwoAAAAASUVORK5CYII=" class="card-type__icon card-type__icon--disabled" ng-class="{'card-type__icon--disabled': !isMasterCard()}"/>
                    </div>
                </div>
                <input type="text" class="card-input card-input--full" placeholder="Номер карты" ng-model="card.number" required card-number/>
                <input type="text" class="card-input card-input--full" placeholder="Имя держателя (как на карте)" ng-model="card.holder" card-holder required/>
                <div class="card-info clearfix">
                    <div class="card-info__date">
                        <div class="card-info__text">
                            Срок действия
                        </div>
                        <input type="text" class="card-input card-input--date" placeholder="ММ / ГГ" ng-model="card.date" card-date required/>
                    </div>
                    <div class="card-info__cvv">
                        <div class="card-info__text">
                            Код безопасности
                        </div>
                        <input type="text" class="card-input card-input--cvv" placeholder="CVV" ng-model="card.cvv" card-cvv required/>
                    </div>
                </div>
                <button class="payment-form__button" ng-disabled="paymentForm.$invalid" ng-click="sendForm()">
                    Купить
                </button>
                <div class="payment-form__agreement">
                    Нажимая на кнопку «Купить», вы даете согласие на регулярные платежи по подписке. Вы всегда сможете отменить подписку в настройках сервиса.
                </div>
            </form>
        </div>
    </div>
@stop

@section('styles')
<style>
    #checkout .clearfix:after{
        content:'';
        display:block;
        clear: both;
    }
    #checkout .container {
        font-family: Arial, Helvetica, sans-serif;
        margin: 50px auto;
        width: 310px;
    }

    #checkout .payment-form {
        padding: 15px 10px;
        background-color: #E6E6E6;
    }
    .payment-form__button{
        width: 100%;
        height: 40px;
        border-radius: 3px;
        border: none;
        outline: none;
        background-color: #ec2860;
        font-size: 14px;
        color: #FFFFFF;
        line-height: 19px;
        cursor: pointer;
        margin: 15px 0 0 0;
    }
    #checkout .payment-form__button:disabled{
        opacity: 0.5;
        cursor: default;
    }
    #checkout .payment-form__agreement{
        color: #989898;
        font-size: 11px;
        line-height: 13px;
        margin: 10px 0;
    }

    #checkout .notification {
        position: relative;
        padding: 15px 0;
        border-bottom: solid 1px #DDDDDD;
    }
    #checkout .notification__icon {
        position: absolute;
        top: 50%;
        margin-top: -17px;
    }
    .notification__text {
        margin-left: 44px;
        display: block;
        color: #989898;
        font-size: 11px;
    }

    .card-type{
        padding: 15px 0 0 0;
    }
    .card-type__label {
        font-size: 12px;
        color: #999999;
        float: left;
        width: auto;
        height: 20px;
        line-height: 20px;
    }
    .card-type__icons {
        text-align: center;
    }
    .card-type__icon {
        vertical-align: middle;
        padding: 0 5px;
    }
    .card-type__icon--disabled {
        filter: grayscale(100%);
        -ms-filter: grayscale(100%);
        -webkit-filter: grayscale(100%);
        opacity: 0.5;
    }

    .card-input {
        border: 1px solid #C6C6C6;
        font-family: Arial;
        font-size: 16px;
        line-height: 22px;
        height: 38px;
        box-sizing: border-box;
        padding: 0 10px;
    }
    .card-input.ng-invalid-first_char, .card-input.ng-invalid-only_latin, .card-input.ng-invalid-date{
        border: 1px solid red;
    }
    .card-input--full {
        width: 100%;
        margin: 15px 0 0 0;
    }
    .card-input--date {
        width: 80px;
        text-align: center;
        margin: 5px 0 0 0;
    }
    .card-input--cvv {
        width: 60px;
        text-align: center;
        margin: 5px 0 0 0;
    }

    .card-info{
        margin: 15px 0 0 0;
    }
    .card-info__date{
        float: left;
        width: 50%;
    }
    .card-info__text{
        font-size: 12px;
        color: #6D6D6D;
        line-height: 17px;
    }
</style>
@stop

@section('scripts')
    <script src='http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script>
    <script src='https://raw.githubusercontent.com/candreoliveira/ngMask/master/dist/ngMask.min.js'></script>

    <script>
        var app = angular.module('app', []);

        app.controller('PaymentFormCtrl', function($scope) {

            $scope.card = {};

            $scope.isVisa = function(){
                if($scope.card.number && $scope.card.number.charAt(0) == 4){
                    return true;
                }else{
                    return false;
                }
            };

            $scope.isMasterCard = function(){
                if($scope.card.number && $scope.card.number.charAt(0) == 5){
                    return true;
                }else{
                    return false;
                }
            };

            $scope.sendForm = function(){
                alert('Card number: ' + $scope.card.number + "\n" + 'Card holder: ' + $scope.card.holder + "\n" + 'Expiry date: ' + $scope.card.date + "\n" + 'Card CVV: ' + $scope.card.cvv );
            };

        });

        app.directive('cardNumber', function($browser){
            return {
                require: 'ngModel',
                link: function($scope, $element, $attrs, ngModelCtrl) {

                    var formatter = function() {
                        var chunks = $element.val().replace(/[^\d]+/g,'').match(/\d{1,4}/g);
                        if(chunks){
                            $element.val(chunks.join(' ').slice(0,19));
                        }else{
                            $element.val('');
                        }
                    };

                    ngModelCtrl.$parsers.push(function(viewValue) {

                        viewValue = viewValue.replace(/[^\d]+/g,'').slice(0,16);

                        if(viewValue.charAt(0) != 4 && viewValue.charAt(0) != 5 && viewValue){
                            ngModelCtrl.$setValidity('first_char', false);
                        }else{
                            ngModelCtrl.$setValidity('first_char', true);
                        }

                        if(viewValue.length < 16){
                            ngModelCtrl.$setValidity('card_length', false);
                        }else{
                            ngModelCtrl.$setValidity('card_length', true);
                        }

                        return viewValue;
                    });

                    ngModelCtrl.$render = function() {
                        formatter();
                    };

                    $element.bind('change', formatter);

                    $element.bind('keydown', function(event) {
                        var key = event.keyCode;
                        if (key == 91 || (15 < key && key < 19) || (37 <= key && key <= 40)){
                            return;
                        }
                        $browser.defer(formatter);
                    });

                    $element.bind('paste cut', function() {
                        $browser.defer(formatter);
                    });

                }
            };
        });

        app.directive('cardHolder', function($browser){
            return {
                require: 'ngModel',
                link: function($scope, $element, $attrs, ngModelCtrl) {

                    var capitalize = function(inputValue) {

                        if(inputValue == undefined) inputValue = '';

                        if(inputValue.search(/[^a-zA-Z\s]+/) === -1){
                            ngModelCtrl.$setValidity('only_latin', true);
                        }else{
                            ngModelCtrl.$setValidity('only_latin', false);
                        }

                        var capitalized = inputValue.toUpperCase();
                        if(capitalized !== inputValue) {
                            ngModelCtrl.$setViewValue(capitalized);
                            ngModelCtrl.$render();
                        }

                        return capitalized;
                    };

                    ngModelCtrl.$parsers.push(capitalize);

                    capitalize($scope[$attrs.ngModel]);

                }
            };
        });

        app.directive('cardDate', function($browser){
            return {
                require: 'ngModel',
                link: function($scope, $element, $attrs, ngModelCtrl) {

                    var formatter = function() {

                        var chunks = $element.val().replace(/[^\d]+/g,'').match(/\d{1,2}/g);

                        if(chunks){
                            $element.val(chunks.join(' / ').slice(0,7));
                        }else{
                            $element.val('');
                        }
                    };

                    ngModelCtrl.$parsers.push(function(viewValue) {

                        viewValue = viewValue.replace(/[^\d]+/g,'');

                        var chunks = viewValue.match(/\d{1,2}/g);

                        if(chunks[0] > 12 || chunks[0] == '00'){
                            ngModelCtrl.$setValidity('date', false);
                        }else{
                            ngModelCtrl.$setValidity('date', true);
                        }

                        if(viewValue.length < 4){
                            ngModelCtrl.$setValidity('date_length', false);
                        }else{
                            ngModelCtrl.$setValidity('date_length', true);
                        }

                        return chunks.join(' / ').slice(0,7);
                    });

                    ngModelCtrl.$render = function() {
                        formatter();
                    };

                    $element.bind('change', formatter);

                    $element.bind('keydown', function(event) {

                        var key = event.keyCode;
                        if (key == 91 || (15 < key && key < 19) || (37 <= key && key <= 40)){
                            return;
                        }

                        $browser.defer(formatter);
                    });
                    $element.bind('paste cut', function() {
                        $browser.defer(formatter);
                    });
                }
            };
        });

        app.directive('cardCvv', function($browser){
            return {
                require: 'ngModel',
                link: function($scope, $element, $attrs, ngModelCtrl) {

                    var formatter = function() {
                        $element.val($element.val().replace(/[^\d]+/g,'').slice(0,3));
                    };

                    ngModelCtrl.$parsers.push(function(viewValue) {
                        viewValue = viewValue.replace(/[^\d]+/g,'');

                        if(viewValue.length < 3){
                            ngModelCtrl.$setValidity('cvv_length', false);
                        }else{
                            ngModelCtrl.$setValidity('cvv_length', true);
                        }

                        return viewValue.slice(0,3);
                    });

                    ngModelCtrl.$render = function() {
                        formatter();
                    };

                    $element.bind('change', formatter);

                    $element.bind('keydown', function(event) {
                        var key = event.keyCode;
                        if (key == 91 || (15 < key && key < 19) || (37 <= key && key <= 40)){
                            return;
                        }

                        $browser.defer(formatter);
                    });

                    $element.bind('paste cut', function() {
                        $browser.defer(formatter);
                    });
                }
            };
        });
    </script>
@stop
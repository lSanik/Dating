/**
 * Created by mosaddek on 3/9/15.
 */

// Spinner

$("input[name='price']").first().TouchSpin({
    min: 0,
    max: 1000,
    step: 0.01,
    decimals: 2,
    boostat: 5,
    maxboostedstep: 10,
    prefix: '$'
});

$("input[type='text']").TouchSpin({
    min: 0,
    max: 1000,
    step: 0.01,
    decimals: 2,
    boostat: 5,
    maxboostedstep: 10,
    postfix: 'LC'
});


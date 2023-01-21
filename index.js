const form = document.getElementById('payment-form');
form.addEventListener('submit', async (event) => {
    event.preventDefault();
    const {token, error} = await stripe.createToken(card);
    if (error) {
        const errorElement = document.getElementById('card-errors');
        errorElement.textContent = error.message;
     } else {
        stripeTokenHandler(token);
    }
});

const stripeTokenHandler = (token) => {
const form = document.getElementById('payment-form');
const hiddenInput = document.createElement('input');
const submitButton = document.querySelector('.submit-form');
hiddenInput.setAttribute('type', 'hidden');
hiddenInput.setAttribute('name', 'stripeToken');
hiddenInput.setAttribute('value', token.id);
form.appendChild(hiddenInput);

// form.submit();

//new AJAX code
const submitForm = (e) => {
    e.preventDefault();
    const request = new XMLHttpRequest();
    request.open('POST', e.target.action);
    if (e.target.status === 200) {
        console.log('successs:' + e.target.response)
    } else {
       console.log('fail')
    }
};
form.addEventListener('submit', submitForm);
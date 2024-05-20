function getRandomNumber() {
    return Math.floor(Math.random() * 100) + 1;
}

function generateNumbers(operation) {
    let number1 = getRandomNumber();
    let number2 = getRandomNumber();
    switch (operation) {
        case 'addition':
            return { number1, number2, result: number1 + number2 };
        case 'subtraction':
            return { number1, number2, result: number1 - number2 };
        case 'multiplication':
            return { number1, number2, result: number1 * number2 };
    }
}

let operation = document.getElementById('operation');
let guessInput = document.getElementById('guess');
let message = document.getElementById('message');

let selectedOperation = operation.value;
let { number1, number2, result } = generateNumbers(selectedOperation);

function checkGuess() {
    let guess = parseInt(guessInput.value);
    if (guess === result) {
        message.textContent = `Congratulations! You guessed the number (${result}) correctly.`;
    } else {
        message.textContent = `Sorry, the correct answer was ${result}. Try again.`;
    }
    // Reset the game
    ({ number1, number2, result } = generateNumbers(selectedOperation));
    guessInput.value = '';
}

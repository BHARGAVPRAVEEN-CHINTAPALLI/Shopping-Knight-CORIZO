const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});


function togglePasswordVisibility(passwordId, toggleId) {
	const passwordInput = document.getElementById(passwordId);
	const toggleIcon = document.getElementById(toggleId);
	if (passwordInput.type === "password") {
		passwordInput.type = "text";
		toggleIcon.classList.add('fa-eye-slash');
	} else {
		passwordInput.type = "password";
		toggleIcon.classList.remove('fa-eye-slash');
	}
}
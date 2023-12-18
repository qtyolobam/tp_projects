function logout() {
    const url = '/user/logout'; 

    // Fetch to destroy the session
    fetch(url, {
        method: 'GET', 
        headers: {
        'Content-Type': 'application/json',
        },
    })
        .then((response) => response.json())
        .then((responseData) => {
        if (responseData.status === 'success') {
            
            window.location.href = '/userLogin/userLogin.html';
        } else {
            alert('Logout failed:', responseData.error);
        }
        })
        .catch((error) => {
                alert('Error during logout:', error);
        });
}


document.addEventListener('DOMContentLoaded', function() {
    fetch('https://ipinfo.io/json?token=53e28173e285ff')
        .then(response => response.json())
        .then(data => {
            document.getElementById('info').innerHTML = `
                <p><strong>IP Address:</strong> ${data.ip}</p>
                <p><strong>Location:</strong> ${data.city}, ${data.region}, ${data.country}</p>
            `;
        })
        
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('info').innerHTML = '<p>Không thể lấy thông tin IP.</p>';
        });
});




// ============== Kiểm soát thời gian truy cập qua ipv4 =========================
const isDetailPage = window.location.pathname.includes('/chi-tiet');

if (isDetailPage) {
    let startTime;
    let timerInterval;

    window.addEventListener('load', () => {
        // Ghi lại thời điểm người dùng vào trang
        startTime = Date.now();
        
        // Khởi động đồng hồ đếm thời gian
        timerInterval = setInterval(() => {
            const currentTime = Date.now();
            const timeSpent = Math.floor((currentTime - startTime) / 1000); // Thời gian ở lại trang tính bằng giây
            console.log(`Time spent on page: ${timeSpent} seconds`);
        }, 1000); // Cập nhật mỗi giây
    });

    window.addEventListener('beforeunload', () => {
        // Dừng đồng hồ đếm thời gian khi người dùng rời trang
        if (timerInterval) {
            clearInterval(timerInterval);
            const currentTime = Date.now();
            const timeSpent = Math.floor((currentTime - startTime) / 1000); // Thời gian ở lại trang tính bằng giây
            console.log(`User spent a total of ${timeSpent} seconds on the page.`);
        }
    });
}

  
  
  
//=====================  Login ================= 
document.getElementById('password-icon').addEventListener('click', function() {
    var passwordField = document.getElementById('password');
    var icon = this;

    if (passwordField.type === 'password') {
      passwordField.type = 'text';
      icon.classList.remove('fa-eye');
      icon.classList.add('fa-eye-slash');
    } else {
      passwordField.type = 'password';
      icon.classList.remove('fa-eye-slash');
      icon.classList.add('fa-eye');
    }
  });

  document.getElementById('repass-icon').addEventListener('click', function() {
    var repassField = document.getElementById('repass');
    var icon = this;

    if (repassField.type === 'password') {
      repassField.type = 'text';
      icon.classList.remove('fa-eye');
      icon.classList.add('fa-eye-slash');
    } else {
      repassField.type = 'password';
      icon.classList.remove('fa-eye-slash');
      icon.classList.add('fa-eye');
    }
  });

  document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var password = document.getElementById('password').value;
    var repass = document.getElementById('repass').value;
    var errorMessage = document.getElementById('error-message');

    if (password === repass) {
      errorMessage.textContent = '';
      this.submit();
    } else {
      errorMessage.textContent = 'Mật khẩu không khớp. Vui lòng thử lại.';
    }
  });







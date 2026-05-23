
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>About Us - Sri Kalyani Mobiles</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Pacifico&family=Quicksand:wght@400;600&display=swap" rel="stylesheet">

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <style>
    body {
      margin: 0;
      font-family: 'Quicksand', sans-serif;
      background: url("images/anime.gif") no-repeat center center fixed;
      background-size: cover;
      color: white;
    }

    header {
      background: transparent;
      padding: 10px 30px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: relative;
    }

    .logo-container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .logo-container img {
      width: 50px;
      height: 50px;
      margin-bottom: 5px;
    }

    .shop-name {
      color: #f6f5f1;
      font-size: 22px;
      font-family: Arial, Helvetica, sans-serif;
    }

    .header-title {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      font-family: Arial, Helvetica, sans-serif;
      font-size: 26px;
      color: #ffffff;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
    }

    .home-button {
      background: linear-gradient(90deg, #00c6ff, #0072ff);
      color: white;
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 30px;
      font-size: 16px;
      font-weight: 600;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s ease, background 0.3s ease;
      font-family: 'Quicksand', sans-serif;
    }

    .home-button:hover {
      background: linear-gradient(90deg, #0072ff, #00c6ff);
      transform: scale(1.05);
    }

    .about-us {
      background: transparent;
      padding: 60px 20px;
      text-align: center;
    }

    .gradient-text {
      font-family: 'Great Vibes', cursive;
      font-size: 48px;
      background: linear-gradient(90deg, #00d4ff, #ff4ecd);
      background-size: 200% auto;
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: gradientMove 4s ease infinite;
      text-shadow: 0 0 10px rgba(0, 212, 255, 0.3), 0 0 20px rgba(255, 78, 205, 0.3);
    }

    @keyframes gradientMove {
      0% { background-position: 0% center; }
      50% { background-position: 100% center; }
      100% { background-position: 0% center; }
    }

    .highlight {
      background: linear-gradient(90deg, #00c6ff, #ff4ecd);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
      font-weight: bold;
      animation: pulse 1s infinite alternate;
    }

    @keyframes pulse {
      from { opacity: 1; }
      to { opacity: 0.6; }
    }

    .about-text p {
      font-size: 18px;
      max-width: 900px;
      margin: 20px auto;
      line-height: 1.8;
      color: #fff;
      opacity: 0;
      transform: translateY(40px);
      transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .about-text p.scroll-revealed {
      opacity: 1;
      transform: translateY(0);
    }

    .testimonials {
      background: transparent;
      padding: 60px 20px;
      text-align: center;
    }

    .testimonials h2 {
      font-family: 'Pacifico', cursive;
      color: #ffd700;
      font-size: 32px;
      margin-bottom: 30px;
      text-align: center;
    }

    .swiper {
      width: 100%;
      max-width: 700px;
      margin: auto;
    }

    .swiper-slide {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 15px;
      padding: 20px;
      font-size: 16px;
      color: #fff;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    }

    .swiper-slide .author {
      margin-top: 15px;
      font-weight: bold;
      color: #ffd700;
    }

    @media (max-width: 768px) {
      .gradient-text {
        font-size: 36px;
      }

      .about-text p {
        font-size: 16px;
      }

      .testimonials h2 {
        font-size: 26px;
      }

      .header-title {
        font-size: 20px;
      }
    }
  </style>

  <!-- ScrollReveal -->
  <script src="https://unpkg.com/scrollreveal"></script>
  <!-- Swiper.js -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>
<body>

  <!-- Header -->
  <header>
    <div class="logo-container">
      <img src="images/logo.png" alt="Logo" />
      <div class="shop-name">SKM</div>
    </div>

    <h1 class="header-title" id="typed-text"></h1>

    <a href="index.php" class="home-button">⌂ Back to Home</a>
  </header>

  <!-- About Section -->
  <section class="about-us" id="about">
    <div class="about-text">
      <p>Welcome to <strong><span class="highlight">Sri Kalyani Mobiles</span></strong> – your destination for stylish, reliable, and affordable mobile accessories.</p>
        <p>We stock phone cases, screen guards, chargers, cables, and headphones for top brands like Apple, Samsung, Redmi, Vivo, Oppo, and more.</p>
        <p>Whether you want bold and funky or elegant and minimal, we have accessories to match your vibe and protect your device.</p>
        <p>All our products are handpicked for quality and performance—because we believe your phone deserves the best.</p>
        <p>Need help choosing? Our friendly team is always ready to assist you in-store or over a call.</p>
        <p>Thousands of happy customers trust <strong><span class="highlight">Sri Kalyani Mobiles</span></strong> for genuine products at the right price.</p>
        <p>Come, explore our collection and experience mobile shopping like never before!</p>
        <p><strong><span class="highlight">Sri Kalyani Mobiles</span></strong> is more than just a mobile accessory store – it's a name that stands for quality, trust, and value.</p>
        <p>Since our inception, we've committed ourselves to providing top-tier mobile products to our local community and beyond.</p>
        <p>We understand how important your device is to you, and that's why we ensure every product we sell meets high standards of durability, performance, and style.</p>
        <p> Our store features a wide variety of items including phone cases, tempered glasses, chargers, headphones, Bluetooth devices, power banks, and many more essential accessories.</p>
        <p> Whether you are using an Apple iPhone, Samsung Galaxy, Redmi, Realme, Vivo, Oppo, or any other brand, you will always find a compatible and stylish product here. </p>
        <p>We pride ourselves on offering both the latest trends and timeless classics to suit every taste.</p>
        <p> Our selection ranges from fun and colorful to sleek and professional – because we know your accessories are an extension of your personality.</p> 
        <p>Beyond just variety, we focus heavily on quality.</p>
        <p> We handpick our inventory from trusted manufacturers to ensure you get value that lasts.</p> 
        <p> Many of our customers return to us not just for our products, but for our honest recommendations and friendly service.</p>
        <p> Our team is trained to assist you with expert advice and help you find exactly what you need – whether you're a tech-savvy youth or a first-time smartphone user.</p>
        <p>We’re also constantly refreshing our stock with new arrivals and innovations to keep up with the latest technology.</p>
        <p><strong><span class="highlight">Sri Kalyani Mobiles</span></strong> isn't just a store, it’s a space where you feel confident shopping.</p>
        <p> We believe in fair pricing – no overcharging, no hidden costs, only genuine products at rates you can trust.</p>
        <p>Over the years, we’ve built lasting relationships with thousands of happy customers, thanks to our commitment to transparency and customer satisfaction.</p>
        <p>We also provide seasonal offers, discounts, and combo deals so you get even more value with every visit. Our loyal customers are the heart of our growth – their feedback and support inspire us to do better every day.</p>
        <p>From the moment you walk into our store to the moment you leave, we want you to feel welcomed, informed, and satisfied.</p>
        <p> Come visit <strong><span class="highlight">Sri Kalyani Mobiles</span></strong> and experience a store where quality, affordability, and friendly service come together.</p> 
        <p> We’re proud of what we’ve built, and we’re excited to help you find the perfect accessories for your mobile lifestyle.</p>
        <p>                  Thankyou for visiting <strong><span class="highlight">SRI KALYANI MOBILES</strong></strong>            </p>      
                
            </div>
          </section>

  <!-- Testimonials -->
  <section class="testimonials" id="testimonials">
    <h2>What Our Customers Say</h2>
    <div class="swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <p>"Awesome shop! Got the perfect case for my iPhone and it’s still like new!"</p>
          <div class="author">– Thirunavukarasu .T</div>
        </div>
        <div class="swiper-slide">
          <p>"SKM has everything under one roof. I recommend them to everyone!"</p>
          <div class="author">– Lakshana .T</div>
        </div>
        <div class="swiper-slide">
          <p>"Been coming here for 4 years now. Best prices and genuine stuff."</p>
          <div class="author">– Nagalakshmi .T</div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </section>

  <!-- Scripts -->
  <script>
    ScrollReveal().reveal('.gradient-text', {
      duration: 1000,
      origin: 'left',
      distance: '100px'
    });

    const paragraphs = document.querySelectorAll('.about-text p');
    paragraphs.forEach((p, i) => {
      ScrollReveal().reveal(p, {
        duration: 600,
        distance: '20px',
        origin: 'bottom',
        delay: i * 60,
        afterReveal: function (el) {
          el.classList.add('scroll-revealed');
        }
      });
    });

    ScrollReveal().reveal('.testimonials h2', {
      duration: 1000,
      origin: 'top',
      distance: '60px'
    });

    ScrollReveal().reveal('.swiper', {
      duration: 1000,
      origin: 'bottom',
      distance: '60px'
    });

    const swiper = new Swiper('.swiper', {
      loop: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      autoplay: {
        delay: 2000,
      },
    });

    const typedText = "About Us";
    let index = 0;
    const speed = 90;
    function typeWriter() {
      if (index < typedText.length) {
        document.getElementById("typed-text").innerHTML += typedText.charAt(index);
        index++;
        setTimeout(typeWriter, speed);
      }
    }
    typeWriter();
  </script>

</body>
</html>


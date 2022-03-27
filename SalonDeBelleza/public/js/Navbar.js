const navSlide = () => {
  const burger = document.querySelector(".burger");
  const nav = document.querySelector(".nav-links");
  const navLinks = document.querySelectorAll(".sidebar ul li");
  const sidebar = document.querySelector(".sidebar");

  burger.addEventListener("click", () => {
    if (sidebar.classList.contains("active")) {
      sidebar.classList.remove("active");
    } else {
      sidebar.classList.add("active");
    }
    navLinks.forEach((link, index) => {
      link.style.animation = `navLinkFade 0.5s ease forwards ${
        index / 7 + 0.3
      }s`;
    });

    //burger animation
    burger.classList.toggle("toggle");
  });
};

navSlide();

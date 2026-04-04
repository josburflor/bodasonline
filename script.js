// ========== CARRUSEL 3D ==========
const teamMembers = [
	{ name: "Maria Sosa", role: "Directora" },
	{ name: "Michael Burgos", role: "Diseñador Creativo" },
	{ name: "Emily Aguilar", role: "Marketing" },
	{ name: "Julia Gimenez", role: "Finanzas" },
	{ name: "Lisa Anderson", role: "Decoradora" },
	{ name: "Jose Flores", role: "Productor de Eventos" }
];

const cards = document.querySelectorAll(".card");
const dots = document.querySelectorAll(".dot");
const memberName = document.querySelector(".member-name");
const memberRole = document.querySelector(".member-role");
const leftArrow = document.querySelector(".nav-arrow.left");
const rightArrow = document.querySelector(".nav-arrow.right");
let currentIndex = 0;
let isAnimating = false;

function updateCarousel(newIndex) {
	if (isAnimating) return;
	isAnimating = true;

	currentIndex = (newIndex + cards.length) % cards.length;

	cards.forEach((card, i) => {
		const offset = (i - currentIndex + cards.length) % cards.length;

		card.classList.remove(
			"center",
			"left-1",
			"left-2",
			"right-1",
			"right-2",
			"hidden"
		);

		if (offset === 0) {
			card.classList.add("center");
		} else if (offset === 1) {
			card.classList.add("right-1");
		} else if (offset === 2) {
			card.classList.add("right-2");
		} else if (offset === cards.length - 1) {
			card.classList.add("left-1");
		} else if (offset === cards.length - 2) {
			card.classList.add("left-2");
		} else {
			card.classList.add("hidden");
		}
	});

	dots.forEach((dot, i) => {
		dot.classList.toggle("active", i === currentIndex);
	});

	memberName.style.opacity = "0";
	memberRole.style.opacity = "0";

	setTimeout(() => {
		memberName.textContent = teamMembers[currentIndex].name;
		memberRole.textContent = teamMembers[currentIndex].role;
		memberName.style.opacity = "1";
		memberRole.style.opacity = "1";
	}, 300);

	setTimeout(() => {
		isAnimating = false;
	}, 800);
}

leftArrow.addEventListener("click", () => {
	updateCarousel(currentIndex - 1);
});

rightArrow.addEventListener("click", () => {
	updateCarousel(currentIndex + 1);
});

dots.forEach((dot, i) => {
	dot.addEventListener("click", () => {
		updateCarousel(i);
	});
});

cards.forEach((card, i) => {
	card.addEventListener("click", () => {
		updateCarousel(i);
	});
});

document.addEventListener("keydown", (e) => {
	if (e.key === "ArrowLeft") {
		updateCarousel(currentIndex - 1);
	} else if (e.key === "ArrowRight") {
		updateCarousel(currentIndex + 1);
	}
});

let touchStartX = 0;
let touchEndX = 0;

document.addEventListener("touchstart", (e) => {
	touchStartX = e.changedTouches[0].screenX;
});

document.addEventListener("touchend", (e) => {
	touchEndX = e.changedTouches[0].screenX;
	handleSwipe();
});

function handleSwipe() {
	const swipeThreshold = 50;
	const diff = touchStartX - touchEndX;

	if (Math.abs(diff) > swipeThreshold) {
		if (diff > 0) {
			updateCarousel(currentIndex + 1);
		} else {
			updateCarousel(currentIndex - 1);
		}
	}
}

updateCarousel(0);

// ========== CALENDARIO INTERACTIVO ==========
let currentDate = new Date();
let currentMonth = currentDate.getMonth();
let currentYear = currentDate.getFullYear();

const monthDisplay = document.getElementById("monthDisplay");
const datesDisplay = document.getElementById("datesDisplay");
const prevMonthBtn = document.getElementById("prevMonthBtn");
const nextMonthBtn = document.getElementById("nextMonthBtn");

function renderCalendar() {
	if (!monthDisplay || !datesDisplay) return;
	
	const months = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
	monthDisplay.textContent = `${months[currentMonth]} ${currentYear}`;

	const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();
	const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

	let datesHtml = "";
	
	// Días vacíos del mes anterior
	for (let i = 0; i < firstDayOfMonth; i++) {
		datesHtml += `<span class="text-muted" style="opacity:0.5"></span>`;
	}
	
	// Días del mes actual
	for (let i = 1; i <= daysInMonth; i++) {
		const today = new Date();
		const isToday = i === today.getDate() && currentMonth === today.getMonth() && currentYear === today.getFullYear();
		datesHtml += `<span class="${isToday ? 'bg-rosa text-white rounded' : ''}" style="${isToday ? 'background:#ff5c8a; color:white; cursor:pointer;' : 'cursor:pointer;'}" data-day="${i}">${i}</span>`;
	}
	
	datesDisplay.innerHTML = datesHtml;
	
	// Agregar evento click a cada día
	document.querySelectorAll("#datesDisplay span").forEach(daySpan => {
		if (daySpan.textContent && !isNaN(parseInt(daySpan.textContent))) {
			daySpan.addEventListener("click", () => {
				const selectedDay = parseInt(daySpan.textContent);
				console.log(`📅 Fecha seleccionada: ${selectedDay}/${currentMonth + 1}/${currentYear}`);
				daySpan.style.backgroundColor = "#ff9bb8";
				daySpan.style.color = "white";
				setTimeout(() => {
					daySpan.style.backgroundColor = "";
					daySpan.style.color = "";
				}, 500);
			});
		}
	});
}

if (prevMonthBtn && nextMonthBtn) {
	prevMonthBtn.addEventListener("click", () => {
		currentMonth--;
		if (currentMonth < 0) {
			currentMonth = 11;
			currentYear--;
		}
		renderCalendar();
	});

	nextMonthBtn.addEventListener("click", () => {
		currentMonth++;
		if (currentMonth > 11) {
			currentMonth = 0;
			currentYear++;
		}
		renderCalendar();
	});
}

renderCalendar();

// ========== RUTAS CARRUSEL ==========
document.addEventListener('DOMContentLoaded', () => {
  const viewport = document.getElementById('rutasViewport');
  const fill = document.getElementById('fillRutas');
  const btnPrev = document.getElementById('btnPrevRutas');
  const btnNext = document.getElementById('btnNextRutas');

  if (viewport && fill && btnPrev && btnNext) {
    const updateProgress = () => {
      const scrollLeft = viewport.scrollLeft;
      const scrollWidth = viewport.scrollWidth - viewport.clientWidth;
      const percentage = scrollWidth > 0 ? (scrollLeft / scrollWidth) * 100 : 0;
      fill.style.width = Math.max(12.5, percentage) + '%';
    };

    btnNext.addEventListener('click', () => {
      viewport.scrollBy({ left: 300, behavior: 'smooth' });
    });

    btnPrev.addEventListener('click', () => {
      viewport.scrollBy({ left: -300, behavior: 'smooth' });
    });

    viewport.addEventListener('scroll', updateProgress);
    updateProgress();
  }
});

// ========== BLOG CARRUSEL ==========
document.addEventListener('DOMContentLoaded', () => {
  const vp = document.getElementById('blogViewport');
  const bar = document.getElementById('barraBlog');
  const btnNext = document.getElementById('btnNextBlog');
  const btnPrev = document.getElementById('btnPrevBlog');

  if (vp && bar && btnNext && btnPrev) {
    const updateProgress = () => {
      const scrollLeft = vp.scrollLeft;
      const scrollWidth = vp.scrollWidth - vp.clientWidth;
      const percent = scrollWidth > 0 ? (scrollLeft / scrollWidth) * 100 : 0;
      bar.style.width = percent + '%';
    };

    btnNext.onclick = (e) => {
      e.preventDefault();
      const items = vp.querySelectorAll('.blog-item');
      if (items.length > 0) {
        const width = items[0].offsetWidth + 20;
        vp.scrollBy({ left: width, behavior: 'smooth' });
      }
    };

    btnPrev.onclick = (e) => {
      e.preventDefault();
      const items = vp.querySelectorAll('.blog-item');
      if (items.length > 0) {
        const width = items[0].offsetWidth + 20;
        vp.scrollBy({ left: -width, behavior: 'smooth' });
      }
    };

    vp.addEventListener('scroll', updateProgress);
    window.addEventListener('resize', updateProgress);
    setTimeout(updateProgress, 100);
  }
});

// ========== EMPRESAS DESTACADAS PREMIUM ==========
document.addEventListener('DOMContentLoaded', () => {
  const vp = document.getElementById('vpPremium');
  const fill = document.getElementById('barPremium');
  const btnNext = document.getElementById('nextPrem');
  const btnPrev = document.getElementById('prevPrem');

  if (vp && fill && btnNext && btnPrev) {
    const updateProgress = () => {
      const scrollLeft = vp.scrollLeft;
      const scrollWidth = vp.scrollWidth - vp.clientWidth;
      const scrollPercent = scrollWidth > 0 ? (scrollLeft / scrollWidth) * 100 : 0;
      fill.style.width = scrollPercent + '%';
    };

    btnNext.onclick = () => {
      const items = vp.querySelectorAll('.premium-item');
      if (items.length > 0) {
        const cardWidth = items[0].offsetWidth + 20;
        vp.scrollBy({ left: cardWidth, behavior: 'smooth' });
      }
    };

    btnPrev.onclick = () => {
      const items = vp.querySelectorAll('.premium-item');
      if (items.length > 0) {
        const cardWidth = items[0].offsetWidth + 20;
        vp.scrollBy({ left: -cardWidth, behavior: 'smooth' });
      }
    };

    vp.addEventListener('scroll', updateProgress);
    window.addEventListener('resize', updateProgress);
    setTimeout(updateProgress, 100);
  }
});

// ========== TRAJES NAVEGACIÓN ==========
document.addEventListener('DOMContentLoaded', () => {
  const navItems = document.querySelectorAll('.nav-traje-item');
  const grid = document.getElementById('trajesGrid');

  if (navItems.length > 0 && grid) {
    navItems.forEach(item => {
      item.addEventListener('click', () => {
        const targetId = item.getAttribute('data-target');
        const targetCard = document.getElementById(`card-${targetId}`);

        navItems.forEach(i => i.classList.remove('active'));
        item.classList.add('active');

        if (targetCard) {
          const offsetLeft = targetCard.offsetLeft - grid.offsetLeft;
          grid.scrollTo({
            left: offsetLeft - 20,
            behavior: 'smooth'
          });
        }
      });
    });

    grid.addEventListener('scroll', () => {
      const cardsWrappers = document.querySelectorAll('.traje-card-wrapper');
      let current = "";

      cardsWrappers.forEach(card => {
        const cardLeft = card.offsetLeft - grid.offsetLeft;
        if (grid.scrollLeft >= cardLeft - 100) {
          current = card.id.replace('card-', '');
        }
      });

      if (current) {
        navItems.forEach(item => {
          item.classList.remove('active');
          if (item.getAttribute('data-target') === current) {
            item.classList.add('active');
          }
        });
      }
    });
  }
});

// ========== PAÍS DE TUS SUEÑOS CARRUSEL ==========
document.addEventListener('DOMContentLoaded', () => {
  const carruseles = [
    { vp: 'vpBodas', bar: 'barBodas' }
  ];

  carruseles.forEach(config => {
    const vp = document.getElementById(config.vp);
    const bar = document.getElementById(config.bar);
    
    if (vp && bar) {
      vp.addEventListener('scroll', () => {
        const scrollWidth = vp.scrollWidth - vp.clientWidth;
        if (scrollWidth <= 0) {
          bar.style.width = '100%';
          return;
        }
        const progress = (vp.scrollLeft / scrollWidth) * 100;
        bar.style.width = Math.min(progress, 100) + '%';
      });

      document.querySelectorAll(`button[data-target="${config.vp}"]`).forEach(btn => {
        btn.onclick = () => {
          const direction = btn.dataset.dir === 'next' ? 1 : -1;
          const items = vp.querySelectorAll('.item-carrusel');
          if (items.length > 0) {
            const scrollAmount = (items[0].offsetWidth + 20) * 2 * direction;
            vp.scrollBy({ left: scrollAmount, behavior: 'smooth' });
          }
        };
      });
      
      bar.style.width = '0%';
    }
  });
});

// ========== SCROLL TOP ==========
document.addEventListener('DOMContentLoaded', function() {
  const btn = document.getElementById('scrollTopBtn');

  if (btn) {
    window.addEventListener('scroll', function() {
      if (window.pageYOffset > 300) {
        btn.classList.add('show');
      } else {
        btn.classList.remove('show');
      }
    });

    btn.addEventListener('click', function() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  }
});

// ========== MODAL DE BIENVENIDA ==========
document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('welcomeModal');
  const closeX = document.getElementById('closeX');
  const btnEntrar = document.getElementById('btnEntrar');

  if (modal && closeX && btnEntrar) {
    function cerrarModal() {
      modal.style.opacity = '0';
      setTimeout(() => {
        modal.style.display = 'none';
      }, 500);
    }

    closeX.addEventListener('click', cerrarModal);
    btnEntrar.addEventListener('click', cerrarModal);

    modal.addEventListener('click', (e) => {
      if (e.target === modal) cerrarModal();
    });
  }
});
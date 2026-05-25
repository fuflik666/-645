<?php include 'db.php'; ?>

<!DOCTYPE html>

<html lang="uk">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Запис | Royal Barber</title>

    <link rel="stylesheet" href="style.css">

</head>

<body class="booking-page">



    <header class="main-header">

        <div class="top-bar">

            <a href="index.html" class="logo-link"><h2 class="logo-text">ROYAL<span>BARBER</span></h2></a>

        </div>

    </header>



    <section class="booking-v2">

        <div class="booking-wrapper">

           

            <form id="bookingForm" method="POST">

               

                <input type="hidden" name="service_id" id="input-service" required>

                <input type="hidden" name="barber_id" id="input-barber" required>

                <input type="hidden" name="date" id="input-date" required>

                <input type="hidden" name="time" id="input-time" required>



                <div class="booking-form-container">

                   

                    <div class="step-indicator">

                        <span class="ind-step active" id="ind-1">1. Послуги</span>

                        <span class="ind-step" id="ind-2">2. Майстер</span>

                        <span class="ind-step" id="ind-3">3. Дата та час</span>

                    </div>



                    <div class="booking-step active" id="step-1">

                        <h3>Оберіть послугу</h3>

                       

                        <div class="accordion-menu">

                            <div class="accordion-header" onclick="toggleAccordion('cat-1')">

                                <span>🪒 Чоловічі стрижки та гоління</span>

                                <span class="arrow" id="arrow-cat-1">▼</span>

                            </div>

                           

                            <div class="accordion-content" id="cat-1">

                                <div class="services-scroll-grid">

                                    <div class="service-card-premium" onclick="selectService(1)">

                                        <div class="s-img-wrapper"><img src="img/service1.jpg" alt=""></div>

                                        <div class="s-info-block">

                                            <h4>Чоловіча стрижка</h4>

                                            <p>Класична техніка, миття та стайлінг.</p>

                                            <span class="price-tag">500 грн</span>

                                        </div>

                                    </div>

                                    <div class="service-card-premium" onclick="selectService(2)">

                                        <div class="s-img-wrapper"><img src="img/service2.jpg" alt=""></div>

                                        <div class="s-info-block">

                                            <h4>Стрижка машинкою</h4>

                                            <p>Швидко та чітко під одну або декілька насадок.</p>

                                            <span class="price-tag">400 грн</span>

                                        </div>

                                    </div>

                                    <div class="service-card-premium" onclick="selectService(3)">

                                        <div class="s-img-wrapper"><img src="img/service3.jpg" alt=""></div>

                                        <div class="s-info-block">

                                            <h4>Стрижка бороди і вусів</h4>

                                            <p>Створення форми, контури небезпечною бритвою.</p>

                                            <span class="price-tag">400 грн</span>

                                        </div>

                                    </div>

                                    <div class="service-card-premium" onclick="selectService(4)">

                                        <div class="s-img-wrapper"><img src="img/service4.jpg" alt=""></div>

                                        <div class="s-info-block">

                                            <h4>Укладка волосся</h4>

                                            <p>Професійний стайлінг для вашої події.</p>

                                            <span class="price-tag">300 грн</span>

                                        </div>

                                    </div>

                                    <div class="service-card-premium" onclick="selectService(5)">

                                        <div class="s-img-wrapper"><img src="img/service5.jpg" alt=""></div>

                                        <div class="s-info-block">

                                            <h4>Стрижка + Борода</h4>

                                            <p>Повний комплекс послуг "Все включено".</p>

                                            <span class="price-tag">700 грн</span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                        <div class="accordion-menu" style="margin-top: 15px;">

                            <div class="accordion-header" onclick="toggleAccordion('cat-2')">

                                <span>👶 Дитячі та додаткові послуги</span>

                                <span class="arrow" id="arrow-cat-2">▼</span>

                            </div>

                            <div class="accordion-content" id="cat-2">

                                <div class="services-scroll-grid">

                                    <div class="service-card-premium" onclick="selectService(6)">

                                        <div class="s-img-wrapper"><img src="img/service6.jpg" alt=""></div>

                                        <div class="s-info-block">

                                            <h4>Дитяча стрижка</h4>

                                            <p>Стильна зачіска для наймолодших джентльменів.</p>

                                            <span class="price-tag">400 грн</span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    <div class="booking-step" id="step-2">

                        <h3>Оберіть свого майстра</h3>

                        <div class="masters-premium-grid">

                            <div class="master-card-premium" onclick="selectMaster(1)">

                                <img src="img/master1.jpg" alt="">

                                <div class="m-details">

                                    <h4>Олександр</h4>

                                    <p>Top Barber</p>

                                </div>

                            </div>

                            <div class="master-card-premium" onclick="selectMaster(2)">

                                <img src="img/master2.jpg" alt="">

                                <div class="m-details">

                                    <h4>Дмитро</h4>

                                    <p>Senior Barber</p>

                                </div>

                            </div>

                            <div class="master-card-premium" onclick="selectMaster(3)">

                                <img src="img/master3.jpg" alt="">

                                <div class="m-details">

                                    <h4>Артем</h4>

                                    <p>Pro Stylist</p>

                                </div>

                            </div>

                        </div>

                        <button type="button" class="btn-back" onclick="goToStep(1)">← Назад до послуг</button>

                    </div>



                    <div class="booking-step" id="step-3">

                        <h3>Оберіть дату та час візиту</h3>

                       

                        <div class="custom-calendar-v4">

    <div class="cal-header-v4" style="display: flex; justify-content: space-between; align-items: center; padding: 10px 15px;">

        <button type="button" id="prev-month-btn" style="background: none; border: none; color: #c5a059; font-size: 20px; cursor: pointer;">◀</button>

        <span class="cal-month-title" id="calendar-month-title">Травень 2026</span>

        <button type="button" id="next-month-btn" style="background: none; border: none; color: #c5a059; font-size: 20px; cursor: pointer;">▶</button>

    </div>

    <div class="cal-weekdays-v4">

        <span>Пн</span><span>Вт</span><span>Ср</span><span>Чт</span><span>Пт</span><span>Сб</span><span>Нд</span>

    </div>

    <div class="cal-days-v4" id="calendar-days-grid"></div>

</div>

                            <div class="cal-weekdays-v4">

                                <span>Пн</span><span>Вт</span><span>Ср</span><span>Чт</span><span>Пт</span><span>Сб</span><span>Нд</span>

                            </div>

                            <div class="cal-days-v4" id="calendar-days-grid"></div>

                        </div>

                       

                        <div class="time-section-premium">

                            <label>Доступні слоти:</label>

                            <div class="slots-grid-premium">

                                <button type="button" class="slot-v4" data-time="10:00">10:00</button>

                                <button type="button" class="slot-v4" data-time="11:00">11:00</button>

                                <button type="button" class="slot-v4" data-time="12:30">12:30</button>

                                <button type="button" class="slot-v4" data-time="14:00">14:00</button>

                                <button type="button" class="slot-v4" data-time="15:30">15:30</button>

                                <button type="button" class="slot-v4" data-time="17:00">17:00</button>

                            </div>

                        </div>



                        <div class="final-inputs-premium">

                            <input type="text" name="name" placeholder="Ваше ім'я" class="dark-input-v4" required>

                            <input type="tel" name="phone" value="+380" class="dark-input-v4" required>

                        </div>



                        <button type="submit" class="btn-submit-premium">ПІДТВЕРДИТИ ЗАПИС</button>

                        <button type="button" class="btn-back" onclick="goToStep(2)">← Назад до майстрів</button>

                    </div>



                </div>

            </form>



        </div>

    </section>



    <script>

        function toggleAccordion(id) {

            const content = document.getElementById(id);

            const arrow = document.getElementById('arrow-' + id);

            if (content.classList.contains('open')) {

                content.classList.remove('open');

                arrow.style.transform = 'rotate(0deg)';

            } else {

                content.classList.add('open');

                arrow.style.transform = 'rotate(180deg)';

            }

        }



        function goToStep(stepNum) {

            document.querySelectorAll('.booking-step').forEach(step => step.classList.remove('active'));

            document.querySelectorAll('.ind-step').forEach(ind => ind.classList.remove('active'));

            document.getElementById('step-' + stepNum).classList.add('active');

            document.getElementById('ind-' + stepNum).classList.add('active');

        }



        function selectService(serviceId) {

            document.getElementById('input-service').value = serviceId;

            setTimeout(() => { goToStep(2); }, 300);

        }

       

        function selectMaster(barberId) {

            document.getElementById('input-barber').value = barberId;

            checkAvailableSlots();

            setTimeout(() => { goToStep(3); }, 300);

        }



        // ГЕНЕРАЦІЯ КАЛЕНДАРЯ

       // ==========================================================================

        // ДИНАМІЧНИЙ КАЛЕНДАР (З ПЕРЕМИКАННЯМ МІСЯЦІВ)

        // ==========================================================================

        const monthNames = ["Січень", "Лютий", "Березень", "Квітень", "Травень", "Червень", "Липень", "Серпень", "Вересень", "Жовтень", "Листопад", "Грудень"];

       

        // Поточна дата комп'ютера клієнта (автоматичний старт з сьогоднішнього дня)

        let currentDate = new Date();

        let currentYear = currentDate.getFullYear();

        let currentMonth = currentDate.getMonth(); // 0 - Січень, 4 - Травень...



        function renderCalendar(year, month) {

            const grid = document.getElementById('calendar-days-grid');

            const monthTitle = document.getElementById('calendar-month-title');

           

            // Очищаємо сітку перед створенням нового місяця

            grid.innerHTML = "";

           

            // Ставимо заголовок (наприклад: Травень 2026)

            monthTitle.innerText = `${monthNames[month]} ${year}`;

           

            // Визначаємо перший день місяця (0 - Неділя, 1 - Понеділок... 6 - Субота)

            let firstDayIndex = new Date(year, month, 1).getDay();

            // Переводимо на європейський лад, де Понеділок = 0, а Неділя = 6

            let startOffset = firstDayIndex === 0 ? 6 : firstDayIndex - 1;

           

            // Визначаємо кількість днів у цьому місяці

            let totalDays = new Date(year, month + 1, 0).getDate();

           

            // 1. Рендеримо пусті клітинки для зміщення першого дня тижня

            for (let i = 0; i < startOffset; i++) {

                const emptyDiv = document.createElement('div');

                emptyDiv.classList.add('cal-day-v4', 'empty');

                grid.appendChild(emptyDiv);

            }

           

            // 2. Рендеримо реальні дні місяця

            for (let day = 1; day <= totalDays; day++) {

                const dayDiv = document.createElement('div');

                dayDiv.classList.add('cal-day-v4');

                dayDiv.innerText = day;

               

                // Перевірка, щоб людина не могла обрати минулі дні (сьогодні або майбутнє)

                let todayCheck = new Date();

                todayCheck.setHours(0,0,0,0);

                let dayCheck = new Date(year, month, day);

               

                if (dayCheck < todayCheck) {

                    dayDiv.classList.add('busy'); // Минулі дні візуально блокуємо

                } else {

                    dayDiv.addEventListener('click', function() {

                        document.querySelectorAll('.cal-day-v4').forEach(d => d.classList.remove('selected'));

                        this.classList.add('selected');

                       

                        // Форматуємо дату під MySQL формат (YYYY-MM-DD)

                        const mm = (month + 1) < 10 ? '0' + (month + 1) : (month + 1);

                        const dd = day < 10 ? '0' + day : day;

                        const fullDate = `${year}-${mm}-${dd}`;

                       

                        document.getElementById('input-date').value = fullDate;

                        checkAvailableSlots(); // Перевіряємо вільні години в базі

                    });

                }

                grid.appendChild(dayDiv);

            }

        }



        // Вішаємо слухачі подій на стрілочки гортання

        document.getElementById('prev-month-btn').addEventListener('click', () => {

            currentMonth--;

            if (currentMonth < 0) {

                currentMonth = 11;

                currentYear--;

            }

            renderCalendar(currentYear, currentMonth);

        });



        document.getElementById('next-month-btn').addEventListener('click', () => {

            currentMonth++;

            if (currentMonth > 11) {

                currentMonth = 0;

                currentYear++;

            }

            renderCalendar(currentYear, currentMonth);

        });



        // Перший запуск календаря при завантаженні сторінки

        renderCalendar(currentYear, currentMonth);



        // Клік по часу

        document.querySelectorAll('.slot-v4').forEach(slot => {

            slot.addEventListener('click', function() {

                document.querySelectorAll('.slot-v4').forEach(s => s.classList.remove('selected'));

                this.classList.add('selected');

                document.getElementById('input-time').value = this.getAttribute('data-time');

            });

        });



        // AJAX ПЕРЕВІРКА ЧАСУ

        function checkAvailableSlots() {

            const date = document.getElementById('input-date').value;

            const barberId = document.getElementById('input-barber').value;

           

            if(!date || !barberId) return;

           

            fetch(`check_time.php?date=${date}&barber_id=${barberId}`)

                .then(response => response.json())

                .then(busySlots => {

                    document.querySelectorAll('.slot-v4').forEach(button => {

                        const time = button.getAttribute('data-time');

                        if(busySlots.includes(time)) {

                            button.disabled = true;

                            button.classList.add('busy');

                            button.classList.remove('selected');

                        } else {

                            button.disabled = false;

                            button.classList.remove('busy');

                        }

                    });

                });

        }



        // ЗБЕРЕЖЕННЯ ЗАПИСУ

        document.getElementById('bookingForm').addEventListener('submit', function(e) {

            e.preventDefault();

            const formData = new FormData(this);

           

            fetch('save_booking.php', {

                method: 'POST',

                body: formData

            })

            .then(response => response.json())

            .then(data => {

                if(data.status === 'success') {

                    showModalWindow(data.message);

                } else {

                    alert(data.message);

                }

            });

        });



        function showModalWindow(text) {

            const modal = document.createElement('div');

            modal.style = "position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.85); display:flex; justify-content:center; align-items:center; z-index:9999;";

            modal.innerHTML = `

                <div style="background:#111; border:2px solid #c5a059; padding:40px; border-radius:15px; text-align:center; color:#fff; max-width:420px; box-shadow: 0 0 20px rgba(197,160,89,0.2);">

                    <div style="font-size: 50px; color: #c5a059; margin-bottom: 10px;">✓</div>

                    <h2 style="color:#c5a059; margin-top:0; margin-bottom:15px; letter-spacing:1px; font-family:sans-serif;">УСПІШНО ПІДТВЕРДЖЕНО</h2>

                    <p style="font-size:16px; line-height:1.5; margin-bottom:25px; color:#ccc; font-family:sans-serif;">${text}</p>

                    <button onclick="window.location.href='index.html'" style="background:#c5a059; color:#000; border:none; padding:12px 35px; font-size:14px; text-transform:uppercase; border-radius:5px; cursor:pointer; font-weight:bold;">Чудово</button>

                </div>

            `;

            document.body.appendChild(modal);

        }

    </script>

</body>

</html>
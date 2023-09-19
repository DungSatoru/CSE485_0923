<div class="sidebar">
  <div class="sidebar__wrapped">
    <div class="sidebar__header">
      <a class="sidebar__header--avatar" href="#">
        <img src="./assets/images/avatar.jpg" alt="">

      </a>
    </div>
    <ul class="sidebar__body">
      <li>
        <a href="#" class="sidebar__button"><i class="fa-solid fa-gear"></i></a>
        <div class="dropdown__menu">
          <div class="dropdown__header">
            <h6 class="dropdown__title">Setting</h6>
          </div>
          <div class="dropdown__body">
            <ul class="dropdown__nav">

            </ul>
          </div>
          <div class="dropdown__footer">
            <a href="#">See all settings</a>
          </div>
        </div>
      </li>
      <li>
        <a href="#" class="sidebar__button"><i class="fa-solid fa-envelope"></i></a>
        <div class="dropdown__menu">
          <div class="dropdown__header">
            <h6 class="dropdown__title">Message</h6>
          </div>
          <div class="dropdown__body">
            <ul class="dropdown__nav">

            </ul>
          </div>
          <div class="dropdown__footer">
            <a href="#">See all messages</a>
          </div>
        </div>
      </li>
      <li>
        <a href="#" class="sidebar__button"><i class="fa-solid fa-bell"></i></a>
        <div class="dropdown__menu">
          <div class="dropdown__header">
            <h6 class="dropdown__title">Notifications</h6>
          </div>
          <div class="dropdown__body">
            <ul class="dropdown__nav">
              <?php
              require_once './connect.php';
              $query = 'SELECT * FROM notifications';
              $notifications = mysqli_query($strConnection, $query);

              while ($row = mysqli_fetch_assoc($notifications)) {
                print_r($row);
                echo $row;
              ?>
                <li class="dropdown__item <?= $row['color'] ?>">
                  <div class="circle"></div>
                  <div class="line"></div>
                  <div class="notify">
                    <span class="notify__time"><?= $row['noti_time'] ?></span>
                    <h5 class="notify__title"><?= $row['title'] ?></h5>
                    <p class="notify__desc"><?= $row['des'] ?></p>
                  </div>
                </li>
              <?php } ?>
            </ul>
          </div>
          <div class="dropdown__footer">
            <a href="#">See all Notifications</a>
          </div>
        </div>
      </li>
    </ul>
    <div class="sidebar__footer">
      <img src="./assets/images/en.png" alt="" class="sidebar__footer-img">
      <ul class="footer__nav">
        <li class="footer__nav--item">
          <span>en</span>
          <ul class="footer__subnav">
            <li><a class="selected" href="#">en</a></li>
            <li><a href="#">hi</a></li>
            <li><a href="#">fr</a></li>
            <li><a href="#">es</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
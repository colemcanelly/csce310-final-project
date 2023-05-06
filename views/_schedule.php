<!-- All Written By: Cole McAnelly
  This is the front-end for the schedule,
  it includes all the components used on the page
  and checks for permissions to know what type of calendar to include.
-->
<section class="d-flex flex-column align-items-center">
  <?php 
  switch ($_SESSION['account_type']) {
    case 0:   // GUEST
      header('Location: http://http://127.0.0.1/foodies/login.php', true, 301);
      break;
    case 1:   // MEMBER
      include_once('./components/calendar/calendar.php');
      break;
    case 2:   // ADMIN
      include_once('./components/adminEvents.php');
      break;
    default:
      break;
  }
  include_once('./components/calendar/event-new.php');
  include_once('./components/calendar/event-edit.php');
  ?>
</section>

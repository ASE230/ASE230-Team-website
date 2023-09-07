<?php
    function displayExperience($experience) {
      echo <<<HTML
        <article class="resume-timeline-item position-relative pb-5">
          <div class="resume-timeline-item-header mb-2">
            <div class="d-flex flex-column flex-md-row">
              <h3 class="resume-position-title font-weight-bold mb-1">{$experience['position']}</h3>
              <div class="resume-company-name ms-auto">{$experience['company']}</div>
            </div>
            <div class="resume-position-time">{$experience['timeline']}</div>
          </div>
          <div class="resume-timeline-item-desc">
            <p>{$experience['description']}</p>
      HTML;

      // experience achievements
      if (!empty($experience['achievements'])) {
        echo '<h4 class="resume-timeline-item-desc-heading font-weight-bold">Achievements:</h4><ul>';
        foreach ($experience['achievements'] as $achievement) {
          echo '<li>' . $achievement . '</li>';
        }
        echo '</ul>';
      }

      // experience tech used
      if (!empty($experience['tech'])) {
        echo '<h4 class="resume-timeline-item-desc-heading font-weight-bold">Technologies used:</h4><ul class="list-inline">';
        foreach ($experience['tech'] as $tech) {
          echo '<li class="list-inline-item"><span class="badge bg-secondary badge-pill">' . $tech . '</span></li>';
        }
        echo '</ul>';
      }

      echo '</div></article>';
    }

    function memberAge($dateOfBirth) {
        $dob = new DateTime($dateOfBirth);
        $currentDate = new DateTime();
        $ageInterval = $currentDate->diff($dob);

        // Decimal points for age
        $age = $ageInterval->y + ($ageInterval->m / 12) + ($ageInterval->d / 365);
        $roundedAge = round($age, 4);

        return $roundedAge;
    }

    function displayCard($person, $name) {
        $avatarURL = isset($person["general"]["avatarURL"]) ? $person["general"]["avatarURL"] : "assets/images/profile.jpg";
        echo "
        <header class='resume-header mt-4 pt-4 pt-md-0'>
            <div class='row'>
                <div class='col-block col-md-auto resume-picture-holder text-center text-md-start'>
                    <img class='picture' src='$avatarURL' alt=''>
                </div>
                <div class='col'>
                    <div class='row p-4 justify-content-center justify-content-md-between'>
                        <div class='primary-info col-auto'>
                            <h1 class='name mt-0 mb-1 text-white text-uppercase text-uppercase'>
                                {$person['general']['name']}
                            </h1>
                            <div class='title mb-1'>{$person['general']['title']}</div>
                            <div class='mb-3'>" . memberAge($person['general']['dob']) . " years old</div>
                            <a href='./detail.php?person=$name' class='btn btn-secondary'>See full profile</a>
                        </div>
                        <div class='secondary-info col-auto mt-2'>
                        </div>
                    </div>
                </div>
            </div>
        </header>";
    }    
?>

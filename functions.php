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
?>

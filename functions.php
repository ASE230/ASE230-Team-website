<?php
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
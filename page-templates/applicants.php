<?php

/*
 * Template Name: Applicants
*/

namespace App;

use Timber\Timber;
use Rareloop\Lumberjack\Post;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;

class ApplicantsController
{
    public function handle()
    {
        $context = Timber::get_context();
        $context['title'] = "Attega | Attega";
        $context['meta_description'] = "Attega";
        $context = getJobListing($context);
        $context = getApplicants($context);
        return new TimberResponse('templates/applicants.twig', $context);
    }
}
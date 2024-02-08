<?php
// t_updateschema.php -- HotCRP tests
// Copyright (c) 2006-2022 Eddie Kohler; see LICENSE.

class UpdateSchema_Tester {
    /** @var Conf
     * @readonly */
    public $conf;

    function __construct(Conf $conf) {
        $this->conf = $conf;
    }

    function test_v258() {
        $updater = new UpdateSchema($this->conf);
        xassert_eqq($updater->v258_review_form_setting('{"overAllMerit":{"name":"Overall merit","position":1,"visibility":"au","options":["Reject","Weak reject","Weak accept","Accept","Strong accept"]},"reviewerQualification":{"name":"Reviewer expertise","position":2,"visibility":"au","options":["No familiarity","Some familiarity","Knowledgeable","Expert"]},"t01":{"name":"Paper summary","position":3,"visibility":"au"},"t02":{"name":"Comments for author","position":4,"visibility":"au"},"t03":{"name":"Comments for PC","position":5,"visibility":"pc"}}'),
            '[{"name":"Overall merit","visibility":"au","options":["Reject","Weak reject","Weak accept","Accept","Strong accept"],"id":"s01","order":1},{"name":"Reviewer expertise","visibility":"au","options":["No familiarity","Some familiarity","Knowledgeable","Expert"],"id":"s02","order":2},{"name":"Paper summary","visibility":"au","id":"t01","order":3},{"name":"Comments for author","visibility":"au","id":"t02","order":4},{"name":"Comments for PC","visibility":"pc","id":"t03","order":5}]');
        xassert_eqq($updater->v258_review_form_setting('[{"id":"s01","name":"Overall merit","position":1,"visibility":"au","options":["Reject","Weak reject","Weak accept","Strong accept"],"option_letter":"A","required":true},{"id":"s02","name":"Reviewer expertise","position":2,"visibility":"au","options":["Some familiarity","Knowledgeable","Expert"],"option_letter":"X","option_class_prefix":"sv-blpu","required":true},{"id":"t02","name":"Comments for author","position":3,"visibility":"au"},{"id":"t03","name":"Comments for PC","position":4,"visibility":"pc"}]'),
            '[{"id":"s01","name":"Overall merit","visibility":"au","options":["Reject","Weak reject","Weak accept","Strong accept"],"option_letter":"A","required":true,"scheme":"svr","order":1},{"id":"s02","name":"Reviewer expertise","visibility":"au","options":["Some familiarity","Knowledgeable","Expert"],"option_letter":"X","required":true,"scheme":"publ","order":2},{"id":"t02","name":"Comments for author","visibility":"au","order":3},{"id":"t03","name":"Comments for PC","visibility":"pc","order":4}]');
        xassert_eqq($updater->v258_review_form_setting('{"overAllMerit":{"name":"Overall merit","view_score":"author","position":1,"options":["Reject","Weak reject","Weak accept","Accept"],"round_mask":0},"reviewerQualification":{"name":"Reviewer expertise","view_score":"author","position":2,"options":["No familiarity","Some familiarity","Knowledgeable","Expert"],"round_mask":0},"paperSummary":{"name":"Paper summary","view_score":"author","position":3,"round_mask":0},"commentsToAuthor":{"name":"Comments for author","view_score":"author","position":4,"round_mask":0},"commentsToPC":{"name":"Comments for PC","view_score":"pc","position":5,"round_mask":0},"commentsToAddress":{"view_score":null,"round_mask":0},"fixability":{"view_score":null,"options":[],"round_mask":0},"grammar":{"view_score":null,"options":[],"round_mask":0},"interestToCommunity":{"view_score":null,"options":[],"round_mask":0},"likelyPresentation":{"view_score":null,"options":[],"round_mask":0},"longevity":{"view_score":null,"options":[],"round_mask":0},"novelty":{"view_score":null,"options":[],"round_mask":0},"potential":{"view_score":null,"options":[],"round_mask":0},"strengthOfPaper":{"view_score":null,"round_mask":0},"suitableForShort":{"view_score":null,"options":[],"round_mask":0},"technicalMerit":{"view_score":null,"options":[],"round_mask":0},"textField7":{"view_score":null,"round_mask":0},"textField8":{"view_score":null,"round_mask":0},"weaknessOfPaper":{"view_score":null,"round_mask":0}}'),
            '[{"name":"Overall merit","options":["Reject","Weak reject","Weak accept","Accept"],"id":"s01","visibility":"au","order":1},{"name":"Reviewer expertise","options":["No familiarity","Some familiarity","Knowledgeable","Expert"],"id":"s02","visibility":"au","order":2},{"name":"Paper summary","id":"t01","visibility":"au","order":3},{"name":"Comments for author","id":"t02","visibility":"au","order":4},{"name":"Comments for PC","id":"t03","visibility":"pc","order":5},{"id":"t04"},{"id":"s11"},{"id":"s07"},{"id":"s05"},{"id":"s08"},{"id":"s06"},{"id":"s03"},{"id":"s10"},{"id":"t06"},{"id":"s09"},{"id":"s04"},{"id":"t07"},{"id":"t08"},{"id":"t05"}]');
        xassert_eqq($updater->v258_review_form_setting('{"novelty":{"name":"Overall merit","position":1,"visibility":"au","options":["Reject","Weak paper, though I will not fight strongly against it","OK paper, but I will not champion it","Good paper, I will champion it"],"option_letter":"A"},"overAllMerit":{"name":"Reviewer Confidence","position":2,"visibility":"au","options":["I am not an expert; my evaluation is that of an informed outsider","I am knowledgeable in this area, but not an expert","I am an expert in this area"],"option_letter":"X"},"reviewerQualification":{"name":"How likely is the paper to spur discussion?","position":3,"visibility":"au","options":["Will not spur discussion","May spur discussion","Will definitely spur discussion"],"option_letter":"A"},"interestToCommunity":{"name":"Does the paper contain surprising results or a new research direction?","position":4,"visibility":"au","options":["no","Yes"],"option_letter":"A"},"longevity":{"name":"Accept as Paper or Poster?","description":"If you think the paper should be accepted, indicate whether you think it should be as a full paper with presentation, or as a poster to be displayed in the workshop.","position":5,"visibility":"au","options":["Paper with presentation","Poster","Not Applicable"],"option_class_prefix":"svr"},"technicalMerit":{"name":"Nominate for Outstanding New Direction Award?","position":6,"visibility":"pc","options":["Yes","No"],"option_class_prefix":"svr"},"t05":{"name":"Paper summary","description":"Please summarize the paper briefly in your own words.","position":7,"visibility":"au"},"t01":{"name":"Strengths","description":"What aspects of the paper are innovate or provocative (likely to spur discussion)? Just a couple sentences, please.","position":8,"visibility":"au"},"t04":{"name":"Weaknesses","description":"What are the paper’s weaknesses? Just a couple sentences, please.\\n\\nPlease remember that this is a workshop -- it is okay for the work to be incomplete.","position":9,"visibility":"au"},"t02":{"name":"Comments for author","position":10,"visibility":"au"},"t03":{"name":"Comments for PC","position":11,"visibility":"pc"}}'),
            '[{"name":"Overall merit","visibility":"au","options":["Reject","Weak paper, though I will not fight strongly against it","OK paper, but I will not champion it","Good paper, I will champion it"],"option_letter":"A","id":"s03","scheme":"svr","order":1},{"name":"Reviewer Confidence","visibility":"au","options":["I am not an expert; my evaluation is that of an informed outsider","I am knowledgeable in this area, but not an expert","I am an expert in this area"],"option_letter":"X","id":"s01","scheme":"svr","order":2},{"name":"How likely is the paper to spur discussion?","visibility":"au","options":["Will not spur discussion","May spur discussion","Will definitely spur discussion"],"option_letter":"A","id":"s02","scheme":"svr","order":3},{"name":"Does the paper contain surprising results or a new research direction?","visibility":"au","options":["no","Yes"],"option_letter":"A","id":"s05","scheme":"svr","order":4},{"name":"Accept as Paper or Poster?","description":"If you think the paper should be accepted, indicate whether you think it should be as a full paper with presentation, or as a poster to be displayed in the workshop.","visibility":"au","options":["Paper with presentation","Poster","Not Applicable"],"id":"s06","scheme":"svr","order":5},{"name":"Nominate for Outstanding New Direction Award?","visibility":"pc","options":["Yes","No"],"id":"s04","scheme":"svr","order":6},{"name":"Paper summary","description":"Please summarize the paper briefly in your own words.","visibility":"au","id":"t05","order":7},{"name":"Strengths","description":"What aspects of the paper are innovate or provocative (likely to spur discussion)? Just a couple sentences, please.","visibility":"au","id":"t01","order":8},{"name":"Weaknesses","description":"What are the paper’s weaknesses? Just a couple sentences, please.\\n\\nPlease remember that this is a workshop -- it is okay for the work to be incomplete.","visibility":"au","id":"t04","order":9},{"name":"Comments for author","visibility":"au","id":"t02","order":10},{"name":"Comments for PC","visibility":"pc","id":"t03","order":11}]');
    }
}

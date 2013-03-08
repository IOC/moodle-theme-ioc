<?php

require_once('../../config.php');
require_once($CFG->dirroot . '/local/mail/locallib.php');
require_once($CFG->dirroot . '/local/mail/create_form.php');

$courseid  = optional_param('course', $SITE->id, PARAM_INT);
$recipient = optional_param('recipient', 0, PARAM_INT);

if (!$course = $DB->get_record('course', array('id' => $courseid))) {
    print_error('invalidcourse', 'error');
}

if (!$user = $DB->get_record('user', array('id' => $recipient))) {
    print_error('invaliduser', 'error');
}

require_login($courseid);
require_sesskey();

$coursecontext = context_course::instance($course->id);

if ($course->id != $SITE->id) {
    if (is_enrolled($coursecontext, $user->id)) {
        if (groups_get_course_groupmode($course) == SEPARATEGROUPS and $course->groupmodeforce
          and !has_capability('moodle/site:accessallgroups', $coursecontext) and !has_capability('moodle/site:accessallgroups', $coursecontext, $user->id)) {
            $mygroups = array_keys(groups_get_all_groups($course->id, $USER->id, $course->defaultgroupingid, 'g.id, g.name'));
            $usergroups = array_keys(groups_get_all_groups($course->id, $user->id, $course->defaultgroupingid, 'g.id, g.name'));
            if (!array_intersect($mygroups, $usergroups)) {
                print_error("groupnotamember", '', "../../course/view.php?id=$course->id");
            }
        }
        // Create message
        $message = local_mail_message::create($USER->id, $course->id);
        $message->add_recipient('to', $recipient);
        $params = array('m' => $message->id());
        $url = new moodle_url('/local/mail/compose.php', $params);
        redirect($url);
    }
    print_error('invaliduser', 'error');
}

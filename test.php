
<?php
include "include/common.php";
// Sample data for notes
$sample_notes = [
    [
        'content' => 'Meeting notes with the team.',
        'attachment' => '',
        'create_date' => '2023-10-01 10:00:00',
        'create_user_id' => 1
    ],
    [
        'content' => 'Project plan for Q4.',
        'attachment' => '',
        'create_date' => '2023-10-02 14:30:00',
        'create_user_id' => 1
    ],
    [
        'content' => 'Ideas for the new marketing campaign.',
        'attachment' => '',
        'create_date' => '2023-10-03 09:15:00',
        'create_user_id' => 1
    ],
    // Additional sample notes
    [
        'content' => 'Client feedback on the latest release.',
        'attachment' => '',
        'create_date' => '2023-10-04 11:00:00',
        'create_user_id' => 1
    ],
    [
        'content' => 'Budget report for the upcoming quarter.',
        'attachment' => '',
        'create_date' => '2023-10-05 16:45:00',
        'create_user_id' => 1
    ],
    [
        'content' => 'Team building activity ideas.',
        'attachment' => '',
        'create_date' => '2023-10-06 08:30:00',
        'create_user_id' => 1
    ]
];

// Insert sample data into the database
foreach ($sample_notes as $note) {
    $sql = "INSERT INTO task (content, attachment, create_date, create_user_id)
            VALUES (?, ?, ?, ?)";
    $data = [$note['content'], $note['attachment'], $note['create_date'], $note['create_user_id']];
    db_execute($sql, $data);
}
?>
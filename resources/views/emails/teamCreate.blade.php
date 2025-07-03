<p>Hi {{ $team->teamLeader->name }},</p>

<p>You have been assigned as the team leader for the "{{ $team->roles->name }}" team.</p>

<p>Description: {{ $team->description }}</p>
<p>Project: {{ $team->projects->title ?? 'N/A' }}</p>

<p>Thanks,<br>Your Team Management System</p>
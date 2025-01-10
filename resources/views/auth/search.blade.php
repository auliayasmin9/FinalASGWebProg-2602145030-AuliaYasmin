<form action="{{ route('search') }}" method="GET">
    <select name="gender">
        <option value="">All Genders</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>

    <input type="text" name="hobby" placeholder="Search by Hobby/Field">

    <button type="submit">Search</button>
</form>

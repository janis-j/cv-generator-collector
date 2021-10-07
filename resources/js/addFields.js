let i = 1;
let fieldType = null;
$(document).ready(function () {
    addFields = function (type) {
        i++;
        const work = '<table><tr><td><input type="text" name="company_name['+i+']" value="" placeholder="Company name"></td>'+
        '<td><input type="text" name="job_title['+i+']" value="" placeholder="Job title"></td></tr>'+
        '<tr><td><input type="text" name="working_hours['+i+']" value="" placeholder="Working hours"></td><td></td></tr>'+
        '<tr><td>From: <select name="work_from['+i+']"><option value=""></option>@for ($i = 1980; $i <= 2021; $i++)<option  value="{{ $i }}">{{ $i }}</option>@endfor</select></td>'+
        '<td>To: <select name="work_to['+i+']"><option value="Now">Now</option>@for ($i = 1980; $i <= 2021; $i++)<option  value="{{ $i }}">{{ $i }}</option>@endfor</select></td></tr>'+
        '<tr><td><input type="text" name="work_description['+i+']" value="" placeholder="Description"  style="width: 171%"></td><td></td></tr>'+
        '<tr><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td><td></td></tr></table>';
        const education = '<table><tr><td><input type="text" name="school_name['+i+']" value="" placeholder="School name"></td>'+
        '<td><input type="text" name="course_name['+i+']" value="" placeholder="Course name"></td></tr>'+
        '<tr><td><input type="text" name="education_level['+i+']" value="" placeholder="Education level"></td><td></td></tr>'+
        '<tr><td>From: <select name="education_from['+i+']"><option value=""></option>@for ($i = 1980; $i <= 2021; $i++)<option  value="{{ $i }}">{{ $i }}</option>@endfor</select></td>'+
        '<td>To: <select name="education_to['+i+']"><option value="Now">Now</option>@for ($i = 1980; $i <= 2021; $i++)<option  value="{{ $i }}">{{ $i }}</option>@endfor</select></td></tr>'+
        '<tr><td><input type="text" name="education_description['+i+']" value="" placeholder="Description" style="width: 171%"></td><td></td></tr>'+
        '<tr><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td><td></td></tr></table>';
        switch (type)
        {
            case 'work':
                type = work;
                fieldType = '#work_fields';
                break;
            case 'education':
                type = education;
                fieldType = '#education_fields';
                break;
        }
        $(fieldType).append(type);
    };
});
$(document).on('click', '.remove-input-field', function () {
    $(this).closest('table').remove();
});



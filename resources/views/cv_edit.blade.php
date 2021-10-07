@extends('main')
@section('pagespecificscripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let i = 0;
        let fieldType = null;
        $(document).ready(function () {
            addFields = function (type,count) {
                count = parseInt(count)
                if(i < count && count !== undefined){i=count};
                i++;
                const work = '<table><tr><td><input type="text" name="company_name['+i+']" value="" placeholder="Company name"></td>'+
                '<td><input type="text" name="job_title['+i+']" value="" placeholder="Job title"></td></tr>'+
                '<tr><td><input type="text" name="working_hours['+i+']" value="" placeholder="Working hours"></td><td></td></tr>'+
                '<tr><td>From: <select name="work_from['+i+']"><option value=""></option>@for ($i = 1980; $i <= 2021; $i++)<option  value="{{ $i }}">{{ $i }}</option>@endfor</select></td>'+
                '<td>To: <select name="work_to['+i+']"><option value="Now">Now</option>@for ($i = 1980; $i <= 2021; $i++)<option  value="{{ $i }}">{{ $i }}</option>@endfor</select></td></tr>'+
                '<tr><td><input type="text" name="work_description['+i+']" value="" placeholder="Description" style="width: 171%"></td><td></td></tr>'+
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
    </script>
@stop
@section('content')
<div class="new_edit">
    <form action="/cv_edit/update/{{$user->id}}" method="post">
        @csrf
        <h3>General Information</h3>
        <table>
            <tr>
                <td>
                    <input type="text" name="name" placeholder="Name" value="{{$user->name}}">
                </td>
                <td>
                    <input type="text" name="surname" placeholder="Surname" value="{{$user->surname}}">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="email" placeholder="Email" value="{{$user->email}}">
                </td>
                <td>
                    <input type="text" name="phone_number" placeholder="Phone number" value="{{$user->phone_number}}">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="skills" placeholder="Skills" value="{{$user->surname}}">
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="languages" placeholder="Languages" value="{{$user->languages}}">
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="interests" placeholder="Interests" value="{{$user->interests}}">
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="additional_info" placeholder="Additional info" value="{{$user->additional_info}}">
                </td>
                <td></td>
            </tr>
        </table>
        <h3>Work experiance</h3>
        <div id="work_fields">
            @foreach($jobs as $key => $work)
                <table>
                    <tr>
                        <td>
                            <input type="text" name="company_name['{{$key}}']" placeholder="Company name" value="{{$work->company_name}}">
                        </td>
                        <td>
                            <input type="text" name="job_title['{{$key}}']" placeholder="Job title" value="{{$work->job_title}}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="working_hours['{{$key}}']" placeholder="Working hours" value="{{$work->working_hours}}">
                        </td>
                        <td></tr>
                    </tr>
                    <tr>
                        <td>
                            From: <select name="work_from['{{$key}}']">
                                <option value=""></option>
                                @for ($i = 1980; $i <= 2021; $i++)
                                    @if ($i === (int) $work->work_from)
                                        <option  value="{{ $i }}" selected>{{ $i }}</option>
                                    @endif
                                    <option  value="{{ $i }}">{{ $i }}</option>
                                @endfor
                              </select>
                        </td>
                        <td>
                            To: <select name="work_to['{{$key}}']">
                                <option value="Now">Now</option>
                                @for ($i = 1980; $i <= 2021; $i++)
                                    @if ($i === (int) $work->work_to)
                                        <option  value="{{ $i }}" selected>{{ $i }}</option>
                                    @endif
                                    <option  value="{{ $i }}">{{ $i }}</option>
                                @endfor
                              </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="work_description['{{$key}}']" placeholder="Description" value="{{$work->work_description}}">
                        </td>
                        <td></tr>
                    </tr>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-outline-danger remove-input-field">Delete</button>
                        </td>
                        <td></tr>
                    </tr>
                </table>
            @endforeach
        </div>
        <button type="button" onclick="addFields('work','{{$key}}')">+ Add More Work Experiance</button>
        <h3>Education</h3>
        <div id="education_fields">
            @foreach ($educations as $key => $education)
                <table>
                    <tr>
                        <td>
                            <input type="text" name="school_name['{{$key}}']" placeholder="School name" value="{{$education->school_name}}">
                        </td>
                        <td>
                            <input type="text" name="course_name['{{$key}}']" placeholder="Course name" value="{{$education->course_name}}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="education_level['{{$key}}']" placeholder="Education level" value="{{$education->education_level}}">
                        </td>
                        <td></tr>
                    </tr>
                    <tr>
                        <td>
                            From: <select name="education_from['{{$key}}']">
                                <option value=""></option>
                                @for ($i = 1980; $i <= 2021; $i++)
                                    @if ($i === (int) $education->education_from)
                                        <option  value="{{ $i }}" selected>{{ $i }}</option>
                                    @endif
                                    <option  value="{{ $i }}">{{ $i }}</option>
                                @endfor
                              </select>
                        </td>
                        <td>
                            To: <select name="education_to['{{$key}}']">
                                <option value="Now">Now</option>
                                @for ($i = 1980; $i <= 2021; $i++)
                                    @if ($i === (int) $education->education_to)
                                        <option  value="{{ $i }}" selected>{{ $i }}</option>
                                    @endif
                                    <option  value="{{ $i }}">{{ $i }}</option>
                                @endfor
                              </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="education_description['{{$key}}']" placeholder="Description" value="{{$education->education_description}}">
                        </td>
                        <td></tr>
                    </tr>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-outline-danger remove-input-field">Delete</button>
                        </td>
                        <td></tr>
                    </tr>
                </table>
            @endforeach
        </div>
        <div>
            <button type="button" onclick="addFields('education','{{$key}}')">+ Add More Education Places</button>
        </div>
        <div>
            <button type="submit">Save</button>
        </div>
    </form>
</div>
@stop

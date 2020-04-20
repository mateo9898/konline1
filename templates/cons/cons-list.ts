import './cons-list.css';

export class ConsList {

    public constructor() {
        //($('#data-table') as any).DataTable();

        ($('#data-table') as any).DataTable({
            'processing': true,
            'serverSide': true,
            'language': {
                //  'url': __('js/datatable-english.json')
            },
            'ajax': {
                'url': 'cons/datatable',
                'type': 'POST'
            },
            'columns': [{
                'data': 'c.id_consultation'
            },
            {
                'data': 'c.start'
            },
            {
                'data': 'c.end'
            },
            {
                'data': 'c.name'
            },
            {
                'orderable': false,
                'searchable': false,
                'data': null,
                'render': function (data: any, type: any, row: any, meta: any) {
                    return '<button type="button" class="btn btn-info">Edit</button>';
                }
            }
            ],
        });
    };

    public demo() {
        return $('#myButton').html();
    }
};

// $(function () {

//     let user = new Student("Jane", "M.", "User");

//     greeter(user);

//     new UserList();
// });

const material_componet = {
    table_link: function (data) {
        data.key=material_componet.checkobj(data.key,'error');
        data.color=material_componet.checkobj(data.color,'warning');

        data.class=material_componet.checkobj(data.class,' btn btn-'+data.color +' m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill m-btn--air');
        data.for=material_componet.checkobj(data.for,'edit');
        data.icon=material_componet.checkobj(data.icon,'la la-edit');

        return '<a href="' + route(data.url, data.key) + '" class="'+data.class+' jtable-'+data.for +' mr-3"' +
            'data-link='+route(data.url,data.key)+'>' +
            '<i class="' + data.icon + '"></i>' +
            '</a>';
    },
    checkobj: function checkobj(obj, emp) {
        return typeof obj === 'undefined' ? emp : obj;

    },
    data:{
        edit_data:'',
        table_callback:'',
    },
    reload_dt:function () {
        material_componet.data.table_callback.ajax.reload();
    },
};


var material_data = {
    jdropzone: {
        return_id: '#drc_name',
        maxFilesize: 5,
        maxFiles: 5,
        addRemoveLinks: true,
        acceptedFiles: ".pdf,.png",
        paramName: "drc",
        success: function (file, response) {
            $(material_data.jdropzone.return_id).val(response);
        },
        removedfile: function (file) {
            var d_url = file.xhr.responseURL;
            x = confirm('Do you want to delete?');
            if (!x) return false;
            $.ajax({
                type: 'POST',
                url: d_url,
                data: {path: $(material_data.jdropzone.return_id).val(), remove: true},
                success: function (res) {
                    if (res.status === true) {
                        $(material_data.jdropzone.return_id).val('');
                        var _ref;
                        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                    } else if (res.status === false) {
                        $(material_data.jdropzone.return_id).val('');
                        swal('Sometimes wrong or Your File is Already Delete');
                    }
                }
            });
        }
    },
};
var material_func = {
    jar_dropzone: function (options) {
        var jae = {
            success: function (file, response) {
                if (settings.reset_input === true) {
                    $(settings.return_id).val(response);
                }
                if (typeof settings.extra !== 'undefined') {
                    settings.extra(response, file);
                }

            },
            removedfile: function (file) {
                if (!file.xhr.responseURL) {
                    alert('Good');
                    return;// The file hasn't been uploaded
                } else {
                    var d_url = file.xhr.responseURL;
                    var path = file.xhr.responseText;
                    x = confirm('Do you want to delete?');
                    if (!x) return false;
                    $.ajax({
                        type: 'POST',
                        url: d_url,
                        data: {path: path, remove: true},
                        success: function (res) {
                            if (res.status === true) {
                                if (settings.reset_input === true) {
                                    $(settings.return_id).val('');
                                }
                                settings.maxFiles = settings.maxFiles + 1;
                                var _ref;
                                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                            } else if (res.status === false) {
                                if (settings.reset_input === true) {
                                    $(settings.return_id).val('');
                                }
                                swal(settings.errormsg);
                            }
                        }
                    });
                }
            },
            //DropZone Initiation Section
            init: function () {
                var jardropzone = this;
                jardropzone.on('resetFiles', function () {
                    if (jardropzone.files.length != 0) {
                        for (i = 0; i < this.files.length; i++) {
                            this.files[i].previewElement.remove();
                        }
                        this.files.length = 0;

                    }
                });
            }
        }

        var settings = $.extend({
            return_id: '#drc_name',
            maxFilesize: 5,
            maxFiles: 5,
            addRemoveLinks: true,
            acceptedFiles: ".pdf,.png",
            paramName: "drc",
            errormsg: 'Sometimes wrong or Your File is Already Delete',
            reset_input: true,
            remove_file: true,
        }, jae, options);
        return settings;
    },
};
(function ($) {
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn';
    $.fn.dataTable.Buttons.defaults.dom.container.className = 'btn-group m-btn-group';
    $.fn.jDatatable = function (options) {

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        var opts = $.extend({
            ajax: {
                url: checkobj(options.url),
                method: checkobj(options.method, 'POST'),
                data: checkobj(options.data, {})
            },
        }, $.fn.jDatatable.defaults, options);

        var table = this;
        table.each(function () {
            var dtable = table.dataTable(opts);

            $(table).find('tfoot .jsearch').each(function () {
                var title = $(this).text();
                $(this).html('<div class="row justify-content-center no-gutters">' +
                    '           <div class="w-100">' +
                    '            <input type="text" class="form-control m-input m-input--air py-3 px-0 text-center" placeholder="' + title + '" id="col' + $(this).index() + '_smart">' +
                    '           </div>' +
                    '       </div>');
            });
            // DataTable
            var individual_search_table = table.DataTable();
            material_componet.data.table_callback=individual_search_table;
            // Apply the search
            individual_search_table.columns().every(function () {
                var that = this;
                $('input', this.footer()).on('keyup change', function () {
                    that
                        .search(this.value)
                        .draw();
                });
            });

            if(opts.delete_btn){
                $(table).find('tbody').on('click','.jtable-delete',function (e) {
                    e.preventDefault();
                    var link=$(this).data('link');
                    $.ajax({
                        url:link,
                        method:'POST',
                        data:{_method:'DELETE'},
                        success:function (res) {
                            toastr.info(res.success, "Success");
                            reload(individual_search_table);
                            success_song.play()
                        }

                    })
                })
            }

            if(opts.edit_modal){
                $(table).find('tbody').on('click','.jtable-edit',function (e) {
                    e.preventDefault();
                    var tr = $(this).closest('tr');
                    var row = individual_search_table.row(tr);
                    var row_data=row.data();
                    var edit_url=$(this).data('link');
                    var jdata={
                        data:row_data,
                        link:edit_url
                    };
                    material_componet.data.edit_data=jdata;
                })
            }
        });

        function checkobj(obj, emp) {
            return typeof obj === 'undefined' ? emp : obj;

        }

        function reload(table) {
            return table.ajax.reload();
        }
        function getdata(data) {
            var da=data;
        }

        function extend(obj, src) {
            for (var key in src) {
                if (src.hasOwnProperty(key)) obj[key] = src[key];
            }
            return obj;
        }

        return this;
    };

    function extend(obj, src) {
        for (var key in src) {
            if (src.hasOwnProperty(key)) obj[key] = src[key];
        }
        return obj;
    }

    function extend1(obj, src) {
        Object.keys(src).forEach(function(key) { obj[key] = src[key]; });
        return obj;
    }

    $.fn.jDatatable.defaults = {
        sDom: '<"row"<"col-md-12 d-flex justify-content-center justify-content-md-start mb-5 mt-3"B>>' +
        '<"row"<"col mb-xs-3"l><"col"f>>' +
        '<"table-responsive position-relative"rt>' +
        '<"row my-3"<"col"i>' +
        '<"col d-flex justify-content-md-end justify-content-center jTablePaginate"p>>',
        processing: true,
        serverSide: true,
        stateSaveParams: function (settings, data) {
            data.search.search = "";
        },
        pagingType: "full_numbers",
        responsive: {
            details: {
                renderer: function (api, rowIdx, columns) {
                    var data = $.map(columns, function (col, i) {
                        return col.hidden ?
                            '<tr class="m-table__row--brand" data-dt-row="' + col.rowIndex + '" data-dt-column="' + col.columnIndex + '">' +
                            '<td class="text-center">' + col.title + ':' + '</td> ' +
                            '</tr>' +
                            '<tr data-dt-row="' + col.rowIndex + '" data-dt-column="' + col.columnIndex + '">' +
                            '<td class="text-center">' + col.data + '</td>' +
                            '</tr>' :
                            '';
                    }).join('');

                    return data ?
                        $('<table class="table m-table table-bordered w-100"/>').append(data) :
                        false;
                }
            },
            // breakpoints: [
            //     {name: 'bigdesktop', width: Infinity},
            //     {name: 'meddesktop', width: 1480},
            //     {name: 'smalldesktop', width: 1280},
            //     {name: 'medium', width: 1188},
            //     {name: 'tabletl', width: 1024},
            //     {name: 'btwtabllandp', width: 848},
            //     {name: 'tabletp', width: 768},
            //     {name: 'mobilel', width: 480},
            //     {name: 'mobilep', width: 320}
            // ]
        },
        autoWidth: false,
        pageLength: 10,
        orderMulti: true,
        stateSave: true,
        // select: {
        //     style: 'os',
        //     blurable: true
        // },
        // stateLoadParams: function (settings, data) {
        //     data.search.search = "";
        // },
        deferRender: true,
        columnDefs: [{className: "text-center", targets: "all"}],
        language: {
            paginate: {
                "previous": '<i class="la la-angle-left"></i>',
                "next": '<i class="la la-angle-right"></i>',
                "first": '<i class="la la-angle-double-left"></i>',
                "last": '<i class="la la-angle-double-right"></i>',
                "more": '<i class="la la-ellipsis-h"></i>',
            },
            aria: {
                "sortAscending": "ascending",
                "sortDescending": "escending",
                paginate: {
                    first: 'First',
                    previous: 'Previous',
                    next: 'Next',
                    last: 'Last'
                },
            },
            decimal: ".",
            thousands: ",",
            emptyTable: "No Data Available In SPK Server",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            infoEmpty: "No Entries Found In SPK Server",
            infoFiltered: "(filtered1 from _MAX_ total entries)",
            search: 'Search:',
            lengthMenu: 'Display ' +
            '<select class="form-control m-input">' +
            '<option value="10">10</option>' +
            '<option value="20">20</option>' +
            '<option value="50">50</option>' +
            '<option value="100">100</option>' +
            '<option value="150">150</option>' +
            '<option value="250">250</option>' +
            '<option value="500">500</option>' +
            '<option value="-1">All</option>' +
            '</select> records',
            searchPlaceholder: 'All Records',
            zeroRecords: "<h3 class='m--font-danger m-5'>No Matching Records Found In SPK Server</h3>",
            loadingRecords: "<i class=\"fa fa-spinner fa-spin fa-3x fa-fw\"></i>SPK Server Loading...",
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>SPK Server Processing....',
        },
        buttons: [
            // {
            //     text: 'Select all',
            //     action: function (e, dt, node, config) {
            //         var $new=dt.page.len(-1).draw();
            //         var c = extend(this,$new);
            //         console.log(c);
            //         $.fn.dataTable.ext.buttons.excelHtml5.action.call(c, e, dt, node, config);
            //         // $new.rows().select();
            //     }
            // },
            {
                text: "<span class='flaticon-refresh'></span>",
                className: "m-btn--pill m-btn btn btn-success",
                action: function (e, dt, node, config) {
                    $('.jsearch input').each(function () {
                        $(this).val('').change();

                    });

                    // $('#product_table tfoot input').val('').change();
                    // dt.state.clear();
                    dt.ajax.reload();
                    // dt.ajax.reload(null, false);
                }
            },
            {
                extend: 'print',
                className: 'm-btn--pill m-btn btn btn-primary',
                ShowAll: true,
                message: "Generated by Sin Phyu Kyun Data Table",
                exportOptions: {orthogonal: 'export', columns: ':visible'},
                key: {key: 'p', altKey: true}
            },
            {
                extend: 'excel',
                className: 'm-btn--pill m-btn--air btn-info',
                exportOptions: {orthogonal: 'export', columns: ':visible'}
            },

            {
                extend: 'pdfHtml5',
                className: 'm-btn--pill m-btn--air btn-success',
                pageSize: 'A4',
                exportOptions: {orthogonal: 'export', columns: ':visible'},
//                        download: 'open'
            },
            {
                extend: 'copy',
                className: 'm-btn--pill m-btn--air btn-focus',
                exportOptions: {orthogonal: 'export', columns: ':visible',modifier: {page: 'current'}}
            },
//                    {extend: 'csv', className: 'm--hide m--visible-desktop m-btn--pill m-btn--air btn-danger'},
            {
                extend: 'colvis', className: 'm-btn--pill m-btn--air btn-danger', text: 'Column'
            },
        ],
        formatNumber: function (toFormat) {
            return toFormat.toString().replace(
                /\B(?=(\d{3})+(?!\d))/g, "'"
            );
        }
    };
}(jQuery));
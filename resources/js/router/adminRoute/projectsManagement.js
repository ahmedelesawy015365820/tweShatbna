

export default [

    {
        path: 'design_projects',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path:'',
                name:'indexDesignProjects',
                component: () => import('../../view/admin/projectsManagement/designProjects/index.vue'),
            },
            {
                path:'project_details/:id',
                name:'designProjectDetails',
                props:true,
                component: () => import('../../view/admin/projectsManagement/designProjects/details.vue'),
            }
        ]
    },
    {
        path: 'company_projects',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path:'',
                name:'indexCompanyProjects',
                component: () => import('../../view/admin/projectsManagement/companyProjects/index.vue'),
            },
            {
                path:'project_details/:id',
                name:'companyProjectDetails',
                props:true,
                component: () => import('../../view/admin/projectsManagement/companyProjects/details.vue'),
            }
        ]
    },
    {
        path: 'sizing_service',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path:'',
                name:'indexSizingService',
                component: () => import('../../view/admin/projectsManagement/sizingService/index.vue'),
            },
            {
                path:'service_details/:id',
                name:'sizingServiceDetails',
                props:true,
                component: () => import('../../view/admin/projectsManagement/sizingService/details.vue'),
            }
        ]
    },
    {
        path: 'external_projects',
        name: 'ExternalProjects',
        component: () => import('../../view/admin/projectsManagement/externalProjects/index.vue')
    },



     //criteria design
     {
        path: 'designers_fines',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'DesignersFines',
                component:() => import('../../view/admin/projectsManagement/designers_fines/index.vue'),
            },
            {
                path: 'create',
                name: 'DesignersFinesCreate',
                component:() => import('../../view/admin/projectsManagement/designers_fines/create.vue'),
            },
            {
                path: 'update/:id(\\d+)',
                name: 'DesignersFinesUpdate',
                component: () => import('../../view/admin/projectsManagement/designers_fines/update.vue'),
                props: true
            },
        ]
    },


    //complaints
    {
        path: 'complaints',
        name: 'complaints',
        component: () => import('../../view/admin/projectsManagement/complaints/index.vue')
    },
    {
        path: 'complaints/update/:id?',
        name: 'updateComplaint',
        component: () => import('../../view/admin/projectsManagement/complaints/update.vue')
    },



    //criteria design
    {
        path: 'designCriteria',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexDesignCriteria',
                component:() => import('../../view/admin/projectsManagement/criteria_designs/index.vue'),
            },
            {
                path: 'create',
                name: 'createDesignCriteria',
                component:() => import('../../view/admin/projectsManagement/criteria_designs/create.vue'),
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'updateDesignCriteria',
                component: () => import('../../view/admin/projectsManagement/criteria_designs/update.vue'),
                props: true
            },
        ]
    },

    //criteria company
    {
        path: 'companyCriteria',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexCompanyCriteria',
                component: () => import('../../view/admin/projectsManagement/criteria_companies/index.vue'),
            },
            {
                path: 'create',
                name: 'createCompanyCriteria',
                component: () => import('../../view/admin/projectsManagement/criteria_companies/create.vue'),
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'updateCompanyCriteria',
                component: () => import('../../view/admin/projectsManagement/criteria_companies/update.vue'),
                props: true
            },
        ]
    },


    //design phases
    {
        path: 'designPhases',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexDesignPhases',
                component: () => import('../../view/admin/projectsManagement/design_phases/index.vue'),
            },
            {
                path: 'create',
                name: 'createDesignPhases',
                component: () => import('../../view/admin/projectsManagement/design_phases/create.vue'),
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'updateDesignPhases',
                component: () => import('../../view/admin/projectsManagement/design_phases/update.vue'),
                props: true
            },
        ]
    },


    //comapny phases
    {
        path: 'companyPhases',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexCompanyPhases',
                component: () => import('../../view/admin/projectsManagement/company_phases/index.vue'),
            },
            {
                path: 'create',
                name: 'createCompanyPhases',
                component: () => import('../../view/admin/projectsManagement/company_phases/create.vue'),
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'updateCompanyPhases',
                component: () => import('../../view/admin/projectsManagement/company_phases/update.vue'),
                props: true
            },
        ]
    },



    //bands
    {
        path: 'phaseBands',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexPhaseBands',
                component: () => import('../../view/admin/projectsManagement/phase_bands/index.vue'),
            },
            {
                path: 'create',
                name: 'createPhaseBands',
                component: () => import('../../view/admin/projectsManagement/phase_bands/create.vue'),
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'updatePhaseBands',
                component: () => import('../../view/admin/projectsManagement/phase_bands/update.vue'),
                props: true
            },
        ]
    },




    //
]

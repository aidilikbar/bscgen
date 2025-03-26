<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Organizational Chart</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">
        <div id="tree-simple" class="Treant"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const positions = @json($nodes);
            const nodeMap = {};
            let root = null;

            // Create node objects
            positions.forEach(pos => {
                nodeMap[pos.id] = {
                    text: {
                        name: pos.name,
                        title: pos.business_unit
                    },
                    HTMLclass: 'node-style',
                    children: []
                };
            });

            // Build tree structure
            positions.forEach(pos => {
                if (pos.parent) {
                    nodeMap[pos.parent].children.push(nodeMap[pos.id]);
                } else {
                    root = nodeMap[pos.id];
                }
            });

            const chartConfig = {
                chart: {
                    container: "#tree-simple",
                    node: { collapsable: true },
                    connectors: { type: 'step' },
                    animation: {
                        nodeAnimation: "easeOutBounce",
                        nodeSpeed: 700,
                        connectorsAnimation: "bounce",
                        connectorsSpeed: 700
                    }
                },
                nodeStructure: root
            };

            new Treant(chartConfig);
        });
    </script>

    <style>
        .node-style {
            padding: 10px;
            background-color: white;
            border: 1px solid #cbd5e0;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
            font-weight: 500;
            text-align: center;
        }
    </style>
</x-app-layout>
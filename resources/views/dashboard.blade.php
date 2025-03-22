<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Organizational Chart</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">
        <div id="tree-simple" class="Treant"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const rawNodes = @json($nodes);
            const nodeMap = {};
            let rootNode = null;

            rawNodes.forEach(node => {
                nodeMap[node.id] = { ...node, children: [] };
            });

            rawNodes.forEach(node => {
                if (node.parent) {
                    nodeMap[node.parent]?.children.push(nodeMap[node.id]);
                } else {
                    rootNode = nodeMap[node.id];
                }
            });

            const chartConfig = {
                chart: {
                    container: "#tree-simple",
                    node: {
                        collapsable: true
                    },
                    connectors: {
                        type: 'step'
                    },
                    animation: {
                        nodeAnimation: "easeOutBounce",
                        nodeSpeed: 700,
                        connectorsAnimation: "bounce",
                        connectorsSpeed: 700
                    }
                },
                nodeStructure: rootNode
            };

            new Treant(chartConfig);
        });
    </script>
</x-app-layout>
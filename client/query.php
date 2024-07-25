WITH RECURSIVE AssemblyHierarchy AS (
    -- Base case: Select direct parts and assemblies of the given assembly
    SELECT 
        ac.ParentAssemblyID,
        ac.ChildPartID,
        ac.ChildAssemblyID,
        ac.Quantity
    FROM 
        AssemblyComponents ac
    WHERE 
        ac.ParentAssemblyID = 4 -- Replace with the ID of your root assembly

    UNION ALL

    -- Recursive case: Select parts and assemblies of the child assemblies
    SELECT 
        ac.ParentAssemblyID,
        ac.ChildPartID,
        ac.ChildAssemblyID,
        ac.Quantity * ah.Quantity AS Quantity
    FROM 
        AssemblyComponents ac
    INNER JOIN 
        AssemblyHierarchy ah ON ac.ParentAssemblyID = ah.ChildAssemblyID
)
SELECT 
    p.PartID,
    p.PartName,
    SUM(ah.Quantity) AS TotalQuantity
FROM 
    AssemblyHierarchy ah
LEFT JOIN 
    Parts p ON ah.ChildPartID = p.PartID
WHERE 
    p.PartID IS NOT NULL
GROUP BY 
    p.PartID, p.PartName;

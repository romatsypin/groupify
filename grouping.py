import pandas as pd
import numpy as np

# Grouping function
def grouping(group, min_memb, max_memb):
    distance = [0]
    for i in range(group.shape[0] - 1):
        distance.append(abs(group.iloc[i + 1]["rating"] - group.iloc[i]["rating"]))
    group["distance"] = distance
    median_dist = group.median()["distance"]
    student = 0
    group_num = 0
    groups_dict = {}
    while student < group.shape[0]:
        key_name = 'group' + str(group_num)
        groups_dict[key_name] = group.iloc[[]]
        if student + 1 != group.shape[0]:
            groups_dict[key_name] = groups_dict[key_name].append(group.iloc[[student]])
            student = student + 1
        elif student + 1 == group.shape[0]:
            groups_dict[key_name] = groups_dict[key_name].append(group.iloc[[student]])
            break
        else:
            break
        while groups_dict[key_name].shape[0] < min_memb:
            groups_dict[key_name] = groups_dict[key_name].append(group.iloc[[student]])
            if student + 1 != group.shape[0]:
                student = student + 1
            else:
                break
            if groups_dict[key_name].shape[0] == min_memb:
                while groups_dict[key_name].shape[0] < max_memb:
                    if group.iloc[student]["distance"] < median_dist:
                        groups_dict[key_name] = groups_dict[key_name].append(group.iloc[[student]])
                        if student + 1 != group.shape[0]:
                            student = student + 1
                        else:
                            break
                    else:
                        break
        if student + 1 == group.shape[0] and group.index.values[-1] == groups_dict[key_name].index.values[-1]:
            break
        group_num = group_num + 1
    return groups_dict